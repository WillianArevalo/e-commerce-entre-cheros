<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "short_description" => "required|string",
            "main_image" => "required|image",
            "price" => "required|numeric",
            "sku" => "required|string",
            "stock" => "required|numeric",
            "barcode" => "required|string",
            "weight" => "required|numeric",
            "dimensions" => "required|string",
            "categorie_id" => "required|numeric",
            "subcategorie_id" => "required|numeric",
            "brand_id" => "required|numeric",
        ];
    }
}
