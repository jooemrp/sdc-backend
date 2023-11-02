<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'title' => 'required|max:255',
            'type' => 'required',
            'body' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
            'meta_title' => 'required',
            'meta_description' => 'required',

            'status' => 'required|in:0,1',
            'slug' => 'required|max:255|unique:contents,slug' . (request('content') ? ',' . request('content') : ''),
        ];
    }
}
