<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ];
    }
}
