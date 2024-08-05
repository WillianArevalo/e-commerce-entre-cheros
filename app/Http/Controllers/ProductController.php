<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Label;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with("categories", "subcategories", "brands", "taxes", "labels", "images")->paginate(10);
        $count = Product::count();
        return view("admin.products.index", ["products" => $products, "count" => $count]);
    }

    public function details(string $id)
    {
        $products = Product::with("categories", "subcategories", "brands", "taxes", "labels", "images")->paginate(10);
        $product = Product::with("categories", "brands", "taxes", "labels", "images")->find($id);
        return view("products.view", ["product" => $product, "products" => $products]);
    }

    public function create()
    {
        $categories = Categorie::all();
        $brands = Brand::all();
        $taxes = Tax::all();
        $labels = Label::all();

        return view("admin.products.create", ["categories" => $categories, "brands" => $brands, "taxes" => $taxes, "labels" => $labels,]);
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $dimensions = $request->input("long") . "x" . $request->input("width") . "x" . $request->input("height") . " " . "cm";
        $validated["dimensions"] = $dimensions;

        $folderName = $request->input("name") . "-" . time();
        $folder = Str::slug($folderName);
        $subFolder = "images/products/" . $folder;

        $product = Product::create($validated);

        if ($request->hasFile("main_image")) {
            $validated["main_image"] = ImageHelper::saveImage($request->file("main_image"), $subFolder);
            $product->update(['main_image' => $validated["main_image"]]);
        }

        if ($product) {
            if ($request->input("tax_id")) {
                $taxIds = $request->input("tax_id");
                $product->taxes()->attach($taxIds);
            }

            if ($request->input("labels")) {
                $labelIds = [];
                foreach ($request->input("labels") as $label) {
                    $label = Label::firstOrCreate(["name" => $label]);
                    $labelIds[] = $label->id;
                }
                $product->labels()->attach($labelIds);
            }

            if ($request->hasFile("gallery_image")) {
                $galleryImages = $request->file("gallery_image");
                $imagesPaths = [];

                foreach ($galleryImages as $galleryImage) {
                    $filePath = ImageHelper::saveImage($galleryImage, $subFolder);
                    $imagesPaths[] = ["image" => $filePath, "product_id" => $product->id];
                }
                $product->images()->createMany($imagesPaths);
            }

            return redirect()->route("admin.products.index")->with("success", "Producto creado correctamente");
        }
    }

    public function show(string $id)
    {
        $product = Product::with("categories", "brands", "taxes", "labels")->find($id);
        $productDimensions = $product->dimensions;
        if (strpos($productDimensions, ' ') !== false) {
            $dimensionsParts = explode(' ', $productDimensions);
            if (count($dimensionsParts) === 2) {
                $dimensions = $dimensionsParts[0];
                $unit = $dimensionsParts[1];
                $dimensionValues = explode('x', $dimensions);
                if (count($dimensionValues) === 3) {
                    $length = $dimensionValues[0];
                    $width = $dimensionValues[1];
                    $height = $dimensionValues[2];
                }
            }
        }
        $product["length"] = $length;
        $product["width"] = $width;
        $product["height"] = $height;
        $nextProduct = Product::where("id", ">", $id)->first();
        $previousProduct = Product::where("id", "<", $id)->first();
        return view("admin.products.show", ["product" => $product, "nextProduct" => $nextProduct, "previousProduct" => $previousProduct]);
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        $images = ProductImage::where("product_id", $id)->get();
        if (!$product) {
            return redirect()->route("admin.products.index")->with("error", "No se pudo encontrar el producto");
        }

        if ($product->main_image) {
            ImageHelper::deleteImage($product->main_image);
        }

        if ($images) {
            $directory = dirname($images->first()->image);
            foreach ($images as $image) {
                ImageHelper::deleteImage($image->image);
            }
            ImageHelper::deleteDirectory($directory);
        }

        $product->delete();
        return redirect()->route("admin.products.index")->with("success", "Producto eliminado correctamente");
    }

    public function edit(string $id)
    {
        $product = Product::with("categories", "brands", "taxes", "labels", "images")->find($id);
        $categories = Categorie::all();
        $brands = Brand::all();
        $taxes = Tax::all();
        $labels = Label::all();

        $productDimensions = $product->dimensions;
        if (strpos($productDimensions, ' ') !== false) {
            $dimensionsParts = explode(' ', $productDimensions);
            if (count($dimensionsParts) === 2) {
                $dimensions = $dimensionsParts[0];
                $unit = $dimensionsParts[1];
                $dimensionValues = explode('x', $dimensions);
                if (count($dimensionValues) === 3) {
                    $length = $dimensionValues[0];
                    $width = $dimensionValues[1];
                    $height = $dimensionValues[2];
                }
            }
        }
        $product["length"] = $length;
        $product["width"] = $width;
        $product["height"] = $height;

        return view("admin.products.edit", ["product" => $product, "categories" => $categories, "brands" => $brands, "taxes" => $taxes, "labels" => $labels]);
    }

    public function update(ProductEditRequest $request, string $id)
    {
        $product = Product::find($id);
        $validated = $request->validated();

        $dimensions = $request->input("long") . "x" . $request->input("width") . "x" . $request->input("height") . " " . "cm";
        $validated["dimensions"] = $dimensions;

        $currentFolderName = Str::slug($product->name . "-" . strtotime($product->created_at));
        $newFolderName = Str::slug($request->input("name") . "-" . strtotime($product->created_at));
        $currentFolderPath = "images/products/" . $currentFolderName;
        $newFolderPath = "images/products/" . $newFolderName;

        if ($currentFolderName !== $newFolderName) {

            Storage::makeDirectory("public/" . $newFolderPath);

            if (!$request->hasFile("main_image")) {
                $mainImagePath = $product->main_image;
                $mainImageFileName = basename($mainImagePath);
                Storage::move("public/" . $mainImagePath, "public/" . $newFolderPath . "/" . $mainImageFileName);
                $validated["main_image"] = $newFolderPath . "/" . $mainImageFileName;
            }

            if (!$request->hasFile("gallery_image")) {
                $productImages = $product->images;
                foreach ($productImages as $productImage) {
                    $imagePath = $productImage->image;
                    $imageFileName = basename($imagePath);
                    Storage::move("public/" . $imagePath, "public/" . $newFolderPath . "/" . $imageFileName);
                    $productImage->update(['image' => $newFolderPath . "/" . $imageFileName]);
                }
            }
        }

        if ($request->hasFile("main_image")) {
            if ($product->main_image) {
                ImageHelper::deleteImage($product->main_image);
            }
            $validated["main_image"] = ImageHelper::saveImage($request->file("main_image"), $newFolderPath);
        }

        if ($product->update($validated)) {
            if ($request->input("tax_id")) {
                $taxIds = $request->input("tax_id");
                $product->taxes()->sync($taxIds);
            }

            if ($request->input("labels")) {
                $labelIds = [];
                foreach ($request->input("labels") as $label) {
                    $label = Label::firstOrCreate(["name" => $label]);
                    $labelIds[] = $label->id;
                }
                $product->labels()->sync($labelIds);
            }

            if ($request->hasFile("gallery_image")) {
                $existingImages = $product->images;
                foreach ($existingImages as $image) {
                    ImageHelper::deleteImage($image->image);
                    $image->delete();
                }

                $galleryImages = $request->file("gallery_image");
                $imagesPaths = [];

                foreach ($galleryImages as $galleryImage) {
                    $filePath = ImageHelper::saveImage($galleryImage, $newFolderPath);
                    $imagesPaths[] = ["image" => $filePath, "product_id" => $product->id];
                }
                $product->images()->createMany($imagesPaths);
            }

            if ($currentFolderName !== $newFolderName) {
                Storage::deleteDirectory("public/" . $currentFolderPath);
            }

            return redirect()->route("admin.products.index")->with("success", "Producto actualizado correctamente");
        }
    }
}