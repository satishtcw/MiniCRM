<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email,' . $this->route('employee'),
            'phone' => 'nullable|numeric|digits:10',
            'profile_pic' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'document' => 'nullable|mimes:pdf|max:10240',
        ];
    }
}
