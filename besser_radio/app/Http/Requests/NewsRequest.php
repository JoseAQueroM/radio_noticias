<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
{
    return [
        'title' => 'required|min:5|max:255',
        'content' => 'required|min:10',
        'category_id' => 'required|exists:categories,id',
        'publish_date' => 'required|date',  // Cambiado de nullable a required
        'status' => 'required|in:draft,published,archived',
        'image' => 'required|image|max:2048',  // Si quieres que sea obligatorio
    ];
}
}