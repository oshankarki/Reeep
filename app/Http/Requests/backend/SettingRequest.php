<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'office_location'=>'required',
            'office_phone'=>'required|numeric|regex:/^[0-9]{10}$/',
            'office_email' => 'required',
            'instagram_link' => 'required|url',
            'facebook_link'=> 'required|url',
            'youtube_link'=> 'required|url',
            'linkedin_link'=> 'required|url',


        ];
        return $rules;
    }
    public function messages(): array
    {
        return [
            'office_phone.regex' => 'Please enter a valid phone number.'
        ];
    }
}
