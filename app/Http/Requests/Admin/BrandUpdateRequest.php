<?php

namespace App\Http\Requests\Admin;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'founded_in' => ['nullable', 'string', 'date_format:Y-m-d', 'before_or_equal:today'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Brand::class)->ignore($this->brand->id)],
            'phone' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255', 'url'],
            'country_of_origin' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'file', 'mimetypes:image/jpeg,image/png', 'max:1024'],
            'additional_info' => ['nullable', 'string', 'max:500'],
        ];
    }
}
