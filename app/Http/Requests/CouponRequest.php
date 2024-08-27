<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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

        $isUpdate = $this->isMethod("put") || $this->isMethod("patch");
        return [
            "code" => "required|string",
            "usage_limit" => "numeric|nullable",
            "discount_type" => "required|string",
            "discount_value" => "required|numeric",
            "start_date" => "required|date",
            "end_date" => "required|date",
            "predefined_rule" => "nullable|string",
            "parameters" => "nullable",
            "active" => "boolean|nullable",
            "type" => "string|required"
        ];
    }
}
