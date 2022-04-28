<?php


use App\Http\Controllers\api\EscortController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Controller
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\AccommodationController;
// Model
use App\Models\User;


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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// GET
Route::get('users', [UserController::class, 'index']); // Listar usuários
Route::get('accommodations', [AccommodationController::class, 'index']); // Listar Acomodações
Route::get('accommodation/info/{id}', [AccommodationController::class, 'info']); // Dados p/ pág. de edição Acomodação
Route::get('escorts/{id}', [EscortController::class, 'index']);
Route::get('escort/{id_user}/{id_escort}', [EscortController::class, 'info']);

// POST
Route::post('users/create', [UserController::class, 'store']); // Criar usuário
Route::post('auth/login', [AuthController::class, 'login']); // Login
Route::post('accommodation/create', [AccommodationController::class, 'store']); // Criar Acomodação
Route::post('escort/create/{id}', [EscortController::class, 'store']); // Cadastrar Acompanhante

// PUT
Route::put('accommodation/update/{id}', [AccommodationController::class, 'update']); // Atualizar Acomodação

// DELETE
Route::delete('accommodation/{id}', [AccommodationController::class, 'destroy']); // Deletendo Acomodação
