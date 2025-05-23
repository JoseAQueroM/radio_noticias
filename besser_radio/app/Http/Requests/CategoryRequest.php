<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:categories,name,'.$this->id,
            'description' => 'nullable|string|max:500',
        ];
    }
}