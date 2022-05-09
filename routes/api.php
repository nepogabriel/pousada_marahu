<?php


use App\Http\Controllers\api\EscortController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Controller
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\AccommodationController;
// Model
use App\Models\User;

use App\Http\Middleware\Api\ProtectedRouteAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([ProtectedRouteAuth::class])->group(function () {
    Route::post('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('accommodation/create', [AccommodationController::class, 'store']); // Criar Acomodação
    Route::get('accommodations', [AccommodationController::class, 'index']); // Listar Acomodações

    // GET
    Route::get('users', [UserController::class, 'index']); // Listar usuários
    Route::get('accommodation/info/{id}', [AccommodationController::class, 'info']); // Dados p/ pág. de edição Acomodação
    Route::get('escorts/{id}', [EscortController::class, 'index']); // Listar todos os acompanhantes
    Route::get('escort/{id_user}/{id_escort}', [EscortController::class, 'info']); // Listar acompanhante específico

    // POST
    Route::post('users/create', [UserController::class, 'store']); // Criar usuário
    Route::post('auth/login', [AuthController::class, 'login']); // Login
    Route::post('escort/create/{id}', [EscortController::class, 'store']); // Cadastrar Acompanhante

    // PUT
    Route::put('accommodation/update/{id}', [AccommodationController::class, 'update']); // Atualizar Acomodação
    Route::put('escort/update/{id_user}/{id_escort}', [EscortController::class, 'update']); // Atualizar Acompanhante

    // DELETE
    Route::delete('accommodation/{id}', [AccommodationController::class, 'destroy']); // Deletendo Acomodação
    Route::delete('escort/delete/{id_user}/{id_escort}', [EscortController::class, 'destroy']); // Deletando Acompanhante
});

Route::post('login', [AuthController::class, 'login']); // Login

route::get('/', function() {
    return response()->json(['api_name' => 'api-marahu', 'api_version' => '1.0.0']);
});






