<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            "phone" => 'required|numeric|regex:/^[0-9]{10}$/',
            'topic' => 'required',
        ];
        return $rules;
    }
    public function messages(): array
    {
        return [
            'phone.regex' => 'Please enter a valid phone number.'
        ];
    }
}
