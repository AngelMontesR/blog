<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthenticateException;

class LoginController extends Controller
{
    /**
     * Autentica un usuario.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
          
            $token = Auth::user()->createToken(Auth::id())->plainTextToken;

            return response()->json(['token' => $token], 200);

        }

        throw new AuthenticateException;

    }

}
