<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Controller
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\api\AuthController;
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
route::get('/', function() {
   return response()->json(['api_name' => 'api-marahu', 'api_version' => '1.0.0']);
});
Route::get('users', [UserController::class, 'index']); // Listar usuários

// POST
Route::post('users/create', [UserController::class, 'store']); // Criar usuário
//Route::post('auth/login', [AuthController::class, 'login']); // Login

// PREFIX
Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});


//Route::post('logout', 'AuthController@logout');
//Route::post('refresh', 'AuthController@refresh');
//Route::post('me', 'AuthController@me');
