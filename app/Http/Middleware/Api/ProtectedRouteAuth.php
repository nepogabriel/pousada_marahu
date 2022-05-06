<?php

namespace App\Http\Middleware\Api;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProtectedRouteAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {

        try {
            // Verificando se a JWT encontra alguma autenticação
            $user = JWTAuth::parsetoken()->authenticate();
            // $access_token_header = explode(' ', $request->header('Authorization'))[1];
        } catch(Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status' => 'Token de autorização inválido!'], 401);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['status' => 'Token de autorização expirado!'], 401);
            } else {
                return response()->json(['status' => 'Token de autorização não encontrado!'], 401);
            }
        }

        return $next($request);
    }
}
