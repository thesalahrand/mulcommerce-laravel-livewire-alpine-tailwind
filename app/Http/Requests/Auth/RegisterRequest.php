<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;

class RegisterRequest extends FormRequest
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
            'role' => ['required', 'string', 'in:user,vendor'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'username' => ['required', 'string', 'lowercase', 'min:3', 'max:12', 'regex:/^[a-z0-9_]+$/', 'unique:' . User::class],
            'phone' => ['nullable', 'required_if:role,vendor', 'string', 'max:255'],
            'address' => ['nullable', 'required_if:role,vendor', 'string', 'max:255'],
            'photo' => ['nullable', 'required_if:role,vendor', 'file', 'mimetypes:image/jpeg', 'max:1024'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    // public function messages(): array
    // {
    //     return [
    //         'username.regex' => 'The :attribute field must only contain lowercase letters, numbers, and underscores.',
    //     ];
    // }
}
