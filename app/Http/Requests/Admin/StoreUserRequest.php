<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Schema;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'email_verified_at' => $this->input('email_verified_at') ?: null,
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email_verified_at' => ['nullable', 'date'],
        ];

        if (Schema::hasColumn('users', 'role')) {
            $rules['role'] = ['nullable', 'string', 'max:255'];
        }

        return $rules;
    }
}
