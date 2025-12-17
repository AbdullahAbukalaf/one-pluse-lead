<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title_en'       => 'required|string|max:120',
            'title_ar'       => 'required|string|max:120',
            'description_en' => 'nullable|string|max:500',
            'description_ar' => 'nullable|string|max:500',
            'details_url'    => 'nullable|string|max:255', // or 'url'
            'display_order'  => 'nullable|integer|min:0',
            'is_active'      => 'sometimes|boolean',
            'icon_svg'       => 'sometimes|file|mimetypes:image/svg+xml|max:1024',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }
}
