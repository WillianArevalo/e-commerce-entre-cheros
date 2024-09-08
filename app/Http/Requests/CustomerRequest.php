<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

        $rules = [
            "phone" => "required|string",
            "birthdate" => "required|date",
            "gender" => "required|string",
            "status" => "nullable|boolean",
            "area_code" => "nullable|string",
            "user_id" => "required|integer|exists:users,id",
        ];

        return $rules;
    }
}
