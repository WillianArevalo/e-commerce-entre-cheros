<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Favorites;
use App\Helpers\ImageHelper;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Label;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories', 'subcategories', 'brands', 'taxes', 'labels', 'images'])->paginate(10);
        $count = Product::count();
        return view('admin.products.index', compact('products', 'count'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $brands = Brand::all();
        $taxes = Tax::all();
        $labels = Label::all();

        return view('admin.products.create', compact('categories', 'brands', 'taxes', 'labels'));
    }

    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $validated['dimensions'] = $this->formatDimensions($request);
            $validated['offer_active'] = $request->has('offer_active') ? 1 : 0;
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;

            $product = Product::create($validated);
            $folderPath = $this->getProductImageFolder($request->input('name'));
            $this->handleImages($request, $product, $folderPath);
            $this->syncTaxesAndLabels($request, $product);

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Producto creado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.products.index')->with('error', 'Error al crear el producto. Error:' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $product = Product::with(['categories', 'brands', 'taxes', 'labels', 'reviews'])->findOrFail($id);
        $this->extractDimensions($product);

        $nextProduct = Product::where('id', '>', $id)->first();
        $previousProduct = Product::where('id', '<', $id)->first();

        return view('admin.products.show', compact('product', 'nextProduct', 'previousProduct'));
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $images = ProductImage::where('product_id', $id)->get();

            if ($product->main_image) {
                ImageHelper::deleteImage($product->main_image);
            }

            foreach ($images as $image) {
                ImageHelper::deleteImage($image->image);
            }

            ImageHelper::deleteDirectory($this->getProductImageFolder($product->name));

            $product->delete();
            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.products.index')->with('error', 'Error al eliminar el producto');
        }
    }

    public function edit(string $id)
    {
        $product = Product::with(['categories', 'brands', 'taxes', 'labels', 'images'])->findOrFail($id);
        $categories = Categorie::all();
        $brands = Brand::all();
        $taxes = Tax::all();
        $labels = Label::all();

        $this->extractDimensions($product);

        return view('admin.products.edit', compact('product', 'categories', 'brands', 'taxes', 'labels'));
    }

    public function update(ProductEditRequest $request, string $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $validated = $request->validated();
            $validated['dimensions'] = $this->formatDimensions($request);
            $validated['offer_active'] = $request->has('offer_active') ? 1 : 0;
            $validated['is_active'] = $request->has('is_active') ? 1 : 0;

            $currentFolderPath = $this->getProductImageFolder($request->input("name"));
            $newFolderPath = $this->getProductImageFolder($request->input('name'), $product->created_at);

            if ($currentFolderPath !== $newFolderPath) {
                $this->moveProductImages($request, $product, $currentFolderPath, $newFolderPath);
            }

            $product->update($validated);
            $this->syncTaxesAndLabels($request, $product);
            $this->handleImages($request, $product, $newFolderPath);

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.products.index')->with('error', 'Error al actualizar el producto');
        }
    }

    // Helper methods
    private function formatDimensions(Request $request)
    {
        return $request->input('long') . 'x' . $request->input('width') . 'x' . $request->input('height') . ' cm';
    }

    private function extractDimensions(Product $product)
    {
        if (strpos($product->dimensions, ' ') !== false) {
            list($dimensions, $unit) = explode(' ', $product->dimensions);
            list($product['length'], $product['width'], $product['height']) = explode('x', $dimensions);
        }
    }

    private function syncTaxesAndLabels(Request $request, Product $product)
    {
        if ($request->has('tax_id')) {
            $product->taxes()->sync($request->input('tax_id'));
        }

        if ($request->has('labels')) {
            $labelIds = array_map(function ($labelName) {
                return Label::firstOrCreate(['name' => $labelName])->id;
            }, $request->input('labels'));
            $product->labels()->sync($labelIds);
        }
    }

    private function handleImages(Request $request, Product $product, $folderPath = null)
    {
        $folderPath = $folderPath ?? $this->getProductImageFolder($product);

        if ($request->hasFile('main_image')) {
            if ($product->main_image) {
                ImageHelper::deleteImage($product->main_image);
            }
            $product->update(['main_image' => ImageHelper::saveImage($request->file('main_image'), $folderPath)]);
        }

        if ($request->hasFile('gallery_image')) {
            $this->saveGalleryImages($request->file('gallery_image'), $product, $folderPath);
        }
    }

    private function saveGalleryImages($galleryImages, Product $product, $folderPath)
    {
        $existingImages = $product->images;
        foreach ($existingImages as $image) {
            ImageHelper::deleteImage($image->image);
            $image->delete();
        }

        $imagesPaths = array_map(function ($image) use ($folderPath, $product) {
            return ['image' => ImageHelper::saveImage($image, $folderPath), 'product_id' => $product->id];
        }, $galleryImages);

        $product->images()->createMany($imagesPaths);
    }

    private function moveProductImages(Request $request, Product $product, $currentFolderPath, $newFolderPath)
    {
        Storage::makeDirectory("public/$newFolderPath");

        if (!$request->hasFile('main_image')) {
            $mainImageFileName = basename($product->main_image);
            Storage::move("public/$currentFolderPath/$mainImageFileName", "public/$newFolderPath/$mainImageFileName");
            $product->update(['main_image' => "$newFolderPath/$mainImageFileName"]);
        }

        if (!$request->hasFile('gallery_image')) {
            foreach ($product->images as $image) {
                $imageFileName = basename($image->image);
                Storage::move("public/$image->image", "public/$newFolderPath/$imageFileName");
                $image->update(['image' => "$newFolderPath/$imageFileName"]);
            }
        }

        Storage::deleteDirectory("public/$currentFolderPath");
    }

    private function getProductImageFolder($name, $createdAt = null)
    {
        return 'images/products/' . Str::slug($name);
    }
}
