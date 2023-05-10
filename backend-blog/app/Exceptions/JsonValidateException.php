<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Validation\Validator;

class JsonValidateException extends Exception
{
    
    protected $validator;

    /**
     * Create a new exception instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Report the exception.
     */
    public function report()
    {
        return false;
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render($request)
    {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $this->validator->errors(),
        ], 422);
    }

}
