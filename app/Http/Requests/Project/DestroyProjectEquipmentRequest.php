<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyProjectEquipmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'equipment_id' => ['required', 'integer', Rule::exists('equipments', 'id')]
        ];
    }
}
