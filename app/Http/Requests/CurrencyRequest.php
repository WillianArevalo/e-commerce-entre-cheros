<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            "code" => "string|required",
            "symbol" => "string|required",
            "name" => "string|required",
            "exchange_rate" => "numeric|required",
            "is_default" => "boolean|nullable",
            "auto_update" => "boolean|nullable",
            "active" => "boolean|nullable"
        ];
    }
}
