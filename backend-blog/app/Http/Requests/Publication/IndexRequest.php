<?php

namespace App\Http\Requests\Publication;

use App\Exceptions\JsonAuthorizationException;
use App\Exceptions\JsonValidateException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          
        ];
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \App\Exceptions\JsonAuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new JsonAuthorizationException;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @return void
     *
     * @throws \App\Exceptions\JsonValidateException
     */
    public function failedValidation(Validator $validator)
    {
        throw new JsonValidateException($validator);
    }

    
}
