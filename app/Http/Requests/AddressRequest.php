<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            "address_line_1"    => "required|string",
            "address_line_2"    => "nullable|string",
            "city"              => "required|string",
            "state"             => "required|string",
            "country"           => "required|string",
            "zip_code"          => "required|string",
            "area_code"         => "required|string",
            "customer_id"       => "required|integer|exists:customers,id",
        ];
    }
}