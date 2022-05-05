<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private $loginService;

    public function __construct(LoginService $loginService) {
        $this->loginService = $loginService;
    }

    public function login(Request $request)
    {

        try {
            $credentials = $request->only('email', 'password');

            $auth = $this->loginService->execute($credentials);

            return response()->json(['status' => true, 'teste' => 'testado!'], 200);
        } catch (\Exception $ex) {
            return response()->json(['error' => true, 'message' => $ex->getMessage()], 500);
        }
    }

//    /**
//     * Get the token array structure.
//     *
//     * @param  string $token
//     *
//     * @return \Illuminate\Http\JsonResponse
//     */
//    protected function respondWithToken($token)
//    {
//        // Formato da resposta
//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'bearer',
//            'expires_in' => auth('api')->factory()->getTTL() * 60
//        ]);
//    }
}
