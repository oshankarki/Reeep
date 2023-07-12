<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description.en' => 'required',
            'description.np' => 'required',
            'program_description.np' => 'required',
            'program_description.en' => 'required',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules = [
                'description' => 'required',
                'program_description' => 'required',
            ];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'description.np.required' => 'The Description in Nepali field is required.',
            'description.en.required' => 'The Description in English field is required.',
            'program_description.np.required' => 'The Description in Nepali field is required.',
            'program_description.en.required' => 'The Description in English field is required.',
        ];
    }
}
