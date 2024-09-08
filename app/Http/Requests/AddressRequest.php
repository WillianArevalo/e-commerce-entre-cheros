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
            "address_line_1" => "required|string",
            "address_line_2" => "nullable|string",
            "city" => "nullable|string",
            "state"  => "nullable|string",
            "country" => "required|string",
            "zip_code" => "required|string",
            "type" => "required|string",
            "customer_id" => "nullable|integer",
            "default" => "nullable|boolean",
            "active" => "nullable|boolean"
        ];
    }
}