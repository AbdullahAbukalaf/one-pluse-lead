<?php

namespace App\Domain\Services\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'slug'     => ['required','string','max:255','unique:services,slug'],
            'summary_en' => ['nullable','string'],
            'summary_ar' => ['nullable','string'],
            'body_en' => ['nullable','string'],
            'body_ar' => ['nullable','string'],
            'is_active' => ['boolean'],
            'position'  => ['integer','min:0'],
        ];
    }
}
