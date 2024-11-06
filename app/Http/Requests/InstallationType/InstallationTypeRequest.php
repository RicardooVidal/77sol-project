<?php

namespace App\Http\Requests\InstallationType;

use Illuminate\Foundation\Http\FormRequest;

class InstallationTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ];
    }
}
