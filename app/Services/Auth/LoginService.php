<?php

namespace App\Services\Auth;

use Exception;

class LoginService
{
    /**
     * @throws Exception
     */
    public function execute(array $credentials) {

        // Verificando se existe erro (Token válido por 6 horas)
        if(!$token = auth()->attempt($credentials))
            throw new Exception('Not authorized', 401);

        // Retornando token e dados do usuário
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ];

        //return response()->json($resposta);
    }
}
