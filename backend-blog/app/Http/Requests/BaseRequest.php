<?php

namespace App\Http\Requests;

use App\Exceptions\JsonAuthorizationException;
use App\Exceptions\JsonValidateException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
   
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
