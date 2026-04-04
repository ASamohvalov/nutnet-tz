<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SignUpFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "login" => "required|max:255|unique:users,login",
            "password" => "required|max:155|min:8",
            "password_confirm" => "required|same:password",
        ];
    }

    public function messages()
    {
        return [
            "login.max" => "логин не может быть более 255 символов",
            "login.unique" => "данный логин уже занят",
            "password.max" => "пароль не может быть более 155 символов",
            "password.min" => "пароль должен быть не менее 8 символов",
            "password_confirm.same"  => "пароли не совпадают",
        ];
    }
}
