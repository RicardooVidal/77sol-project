<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function rules(): array
    {
        $customerId = $this->route('customer');

        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:customers,email,' . $customerId],
            'phone' => ['required', 'string'],
            'document' =>  ['required', 'string', 'unique:customers,document,' . $customerId]
        ];
    }
}
