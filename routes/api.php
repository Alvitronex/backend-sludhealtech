<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\map;

Route::get('/usuarios/', [ApiController::class, 'mostrar_usuarios']);
Route::get('/usuarios/mostrar/id={user_id}', [ApiController::class, 'mostrar_un_usuarios']);
Route::post('/usuarios/mostrar2', [ApiController::class, 'mostrar_un_usuarios2']);
Route::post('/usuarios/crear', [ApiController::class, 'crear']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sanctum/token', [AuthController::class, 'generateToken']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/sanctum/crear', [AuthController::class, 'crear']);

Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    // $request->user()->currentAccessToken()->delete();
    // return 'Token actual eliminado';
    return "tokens eliminados";
});
Route::post('/user/revoke', [AuthController::class, 'revokeToken']);
