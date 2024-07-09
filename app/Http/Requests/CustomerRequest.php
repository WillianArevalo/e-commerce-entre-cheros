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

        $isUpdate = $this->isMethod("put") || $this->isMethod("patch");

        $rules = [
            "phone" => "required|string",
            "birthdate" => "required|date",
            "gender" => "required|string",
            "email" => "required|email",
            "username" => "required|string",
            "name" => "required|string",
            "last_name" => "required|string",
            "profile" => "required|image",
        ];

        if ($isUpdate) {
            $rules["profile"] = "nullable|image";
            $rules["password"] = "nullable|string";
            $rules["password_confirmation"] = "nullable|string";
        } else {
            $rules["password"] = "required|string";
            $rules["password_confirmation"] = "required|string";
            $rules["profile"] = "required|image";
        }

        return $rules;
    }
}
