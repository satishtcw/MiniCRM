<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $companyId = $this->route('company');

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $companyId,
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',
        ];
    }
	
	/**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The company name is required.',
            'email.required' => 'The company email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered with another company.',
            'logo.image' => 'The logo must be an image file (JPG, PNG, JPEG).',
            'logo.mimes' => 'The logo must be a file of type: jpg, png, jpeg.',
            'logo.max' => 'The logo must not be larger than 2MB.',
            'logo.dimensions' => 'The logo dimensions must not be smaller than 100*100.',
        ];
    }
}
