<?php

namespace App\Services\Auth;

use Exception;

class LoginService
{
    /**
     * @throws Exception
     */
    public function execute(array $credentials) {

        print_r($credentials);

//        // Verificando se existe erro (Token válido por 6 horas)
//        if(!$token = auth()->setTTL(6*60)->attempt($credentials))
//            throw new Exception('Not authorized', 401);
//
//        // Retornando token e dados do usuário
//        return [
//            'access_token' => $token,
//            'token_type'   => 'Bearer',
//            'expires_in'   => auth()->factory()->getTTL(),
//            'user'         => auth()->user()
//        ];
    }
}
