<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoOrderRequest extends FormRequest
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
            "last_name" => "required|string",
            "area_code" => "required|string",
            "phone" => "required|string",
            "email" => "required|email",
            "address_line_1" => "required|string",
            "address_line_2" => "nullable|string",
            "country" => "required|string",
            "city" => "nullable|string",
            "state" => "nullable|string",
            "zip_code" => "nullable|string",
        ];
    }
}