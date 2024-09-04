<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "username" => "required|string",
            "email" => "required|string",
            "name" => "required|string",
            "last_name" => "required|string",
            "role" => "required|string",
            "locale" => "nullable|string",
            "currency" => "nullable|string",
            "timezone" => "nullable|string",
        ];

        if ($isUpdate) {
            $rules["password"] = "nullable|string";
            $rules["profile"] = "nullable|image:jpeg,png,jpg,gif,svg|max:2048";
        } else {
            $rules["password"] = "required|string";
            $rules["password_confirmation"] = "required|string";
            $rules["profile"] = "nullable|image:jpeg,png,jpg,gif,svg|max:2048";
        }

        return $rules;
    }
}
