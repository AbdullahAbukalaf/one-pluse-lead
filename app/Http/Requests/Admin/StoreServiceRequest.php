<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'slug'            => ['required','alpha_dash','unique:services,slug'],
            'title_en'        => ['required','string','max:255'],
            'title_ar'        => ['required','string','max:255'],
            'description_en'  => ['nullable','string'],
            'description_ar'  => ['nullable','string'],
            'icon_svg'        => ['nullable','file','mimetypes:image/svg+xml','max:2048'],
            'is_active'       => ['boolean'],
            'display_order'   => ['nullable','integer','min:0','max:65535'],
        ];
    }
}
