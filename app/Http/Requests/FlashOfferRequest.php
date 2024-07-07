<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlashOfferRequest extends FormRequest
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
            "product_id" => "required",
            "offer_price" => "required|numeric",
            "offer_start_date" => "required|date",
            "offer_end_date" => "required|date",
            "is_showing" => "nullable",
            "is_active" => "nullable"
        ];
    }
}