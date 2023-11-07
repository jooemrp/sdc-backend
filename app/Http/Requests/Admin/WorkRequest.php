<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'category' => 'required|max:255',
            'color' => 'nullable|max:255',
            'preview' => 'required',
            'challenge' => 'required',
            'approach' => 'required',
            'result' => 'required',
            // 'meta_title' => '',
            // 'meta_description' => '',
        ];

        if (!is_null(request()->file('thumbnail'))) {
            $rules['thumbnail'] = 'image|mimes:jpeg,png,jpg|max:512';
        }

        if (!is_null(request()->file('content')) && !is_array(request()->file('content'))) {
            $rules['content'] = 'image|mimes:jpeg,png,jpg,webp|max:512';
        } elseif (!is_null(request()->file('content')) && is_array(request()->file('content'))) {
            $rules['content'] = 'nullable|array|min:1';
            $rules['content.*'] = 'image|mimes:jpeg,png,jpg,webp|max:512';
        }

        return $rules;
    }
}
