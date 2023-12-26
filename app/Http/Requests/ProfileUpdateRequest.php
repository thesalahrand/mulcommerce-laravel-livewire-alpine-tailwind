<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'username' => ['required', 'string', 'lowercase', 'min:3', 'max:12', 'regex:/^[a-z0-9_]+$/', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'file', 'mimetypes:image/jpeg', 'max:1024'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }
}
