<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'quantity' => ['required', 'integer', 'min:1']
        ];
    }
}
