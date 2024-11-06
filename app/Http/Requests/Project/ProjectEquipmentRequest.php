<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectEquipmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'equipment_id' => ['required', 'integer', Rule::exists('equipments', 'id')],
            'quantity' => ['required', 'integer', 'min:1']
        ];
    }
}
