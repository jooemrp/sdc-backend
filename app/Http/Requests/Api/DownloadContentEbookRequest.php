<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DownloadContentEbookRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'numeric']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if (request()->is('api*')) {
            throw new HttpResponseException(response()->json([
                'error' => [
                    'message' => implode(" ", $validator->errors()->all()),
                    'status_code' => 406,
                    'error' => $validator->errors()
                ]
            ], 406));
        }

        $this->validator = $validator;
    }
}
