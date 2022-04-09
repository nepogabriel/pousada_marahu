<?php


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

// POST
Route::post('users/create', [UserController::class, 'store']); // Criar usuário
Route::post('auth/login', [AuthController::class, 'login']); // Login
Route::post('accommodation/create', [AccommodationController::class, 'store']); // Criar Acomodação



//Route::post('/login', function(Request $request){
//
//    // Autenticação
//    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//        $user = Auth::user();
//
//        //Gerar token
//        $token = $user->createToken('JWT');
//
//        return response()->json($token, 200);
//    }
//
//    return response()->json('Usuário inválido', 401);
//});

// DEU CERTO
//Route::get('users', function() {
//    return 'Deu certo';
//});
