<?php

namespace App\Exceptions;

use Exception;

class JsonAuthorizationException extends Exception
{
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
            'message' => 'No autorizado.'
        ], 403);
    }

}
