<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
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
            'title' => 'required|unique:menus,title',
            'slug' => 'required|unique:menus,slug',
            'status' => 'required',
            'order' => 'required',
            'type' => 'required',
        ];
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['title'] = [
                'required',
                'max:255',
                Rule::unique('menus')->ignore($this->route('menu')),
            ];
            $rules['slug'] = [
                'required',
                'max:255',
                Rule::unique('menus')->ignore($this->route('menu')),
            ];
        }
        return $rules;
    }
}
