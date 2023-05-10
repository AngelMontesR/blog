<?php

namespace App\Exceptions;

use Exception;

class AuthenticateException extends Exception
{
    /**
     * Reporta la excepción.
     *
     * @return bool|null
     */
    public function report()
    {
        return false;
    }

    /**
     * Muestra una respuesta HTTP JSON.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function render($request)
    {
        return response()->json(['status' => 'No autorizado'], 401);
    }

}
