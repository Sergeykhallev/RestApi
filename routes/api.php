<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});
Route::middleware('jwt.auth')->namespace('Post')->prefix('posts')->group(function(){

    Route::get('/posts', [\App\Http\Controllers\IndexController::class, 'index']);
    Route::get('/create', [\App\Http\Controllers\CreateController::class, 'create']);
    Route::post('/', [\App\Http\Controllers\StoreController::class, 'store']);
    Route::get('/{post}', [\App\Http\Controllers\ShowController::class, 'show']);
    Route::get('/{post}/edit', [\App\Http\Controllers\EditController::class, 'edit']);
    Route::patch('/{post}', [\App\Http\Controllers\UpdateController::class, 'update']);
    Route::delete('/{post}/delete', [\App\Http\Controllers\DestroyController::class, 'destroy']);
});
