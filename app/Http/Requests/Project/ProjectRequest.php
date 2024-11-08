<?php

namespace App\Http\Requests\Project;

use App\Support\States;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'integer', Rule::exists('customers', 'id')],
            'installation_type_id' => ['required', 'integer', Rule::exists('installation_types', 'id')],
            'location' => ['required', 'string', Rule::in(States::all())]
        ];
    }
}
