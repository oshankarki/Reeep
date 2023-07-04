<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'title'=>'required',
            'slug'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'pdf'=> 'required|pdf|mimes:pdf|max:2048',

        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules = [
                'title'=>'required',
                'slug'=>'required',
                'description' => 'required'
            ];
        }
        return $rules;
    }
}
