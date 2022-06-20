<?php


use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\EscortController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Controller
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AccommodationController;
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
    // GET
    Route::get('users', [UserController::class, 'index']); // Listar usuários
    Route::get('escorts/{id}', [EscortController::class, 'index']); // Listar todos os acompanhantes
    Route::get('escort/{id_user}/{id_escort}', [EscortController::class, 'info']); // Listar acompanhante específico

    // POST
    Route::post('accommodation/create', [AccommodationController::class, 'store']); // Criar Acomodação
    Route::post('escort/create/{id}', [EscortController::class, 'store']); // Cadastrar
    Route::post('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    // PUT
    Route::put('user/update/{id}', [UserController::class, 'update']); // Atualizar Acomodação
    Route::put('accommodation/update/{id}', [AccommodationController::class, 'update']); // Atualizar Acomodação
    Route::put('escort/update/{id_user}/{id_escort}', [EscortController::class, 'update']); // Atualizar Acompanhante

    // DELETE
    Route::delete('user/delete/{id}', [UserController::class, 'destroy']); // Deletando Usuário
    Route::delete('accommodation/{id}', [AccommodationController::class, 'destroy']); // Deletendo Acomodação
    Route::delete('escort/delete/{id_user}/{id_escort}', [EscortController::class, 'destroy']); // Deletando Acompanhante
});

Route::post('login', [AuthController::class, 'login']); // Login
Route::post('user/create', [UserController::class, 'store']); // Criar usuário
Route::get('accommodations', [AccommodationController::class, 'index']); // Listar Acomodações
Route::get('accommodation/info/{id}', [AccommodationController::class, 'info']); // Listar Acomodação específica

// App - PHP + Ionic(vue.js)
Route::post('app/create', [AppController::class, 'store']);
Route::get('app/list', [AppController::class, 'index']);
Route::get('app/info/{id}', [AppController::class, 'info']);

route::get('/', function() {
    return response()->json(['api_name' => 'api-marahu', 'api_version' => '1.0.0']);
});






