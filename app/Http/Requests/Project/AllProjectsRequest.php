<?php

namespace App\Http\Requests\Project;

use App\Support\States;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AllProjectsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'customer_id' => ['nullable', 'integer'],
            'installation_type_id' => ['nullable', 'integer'],
            'location' => ['nullable', Rule::in(States::all())]
        ];
    }
}
