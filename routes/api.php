<?php

use App\Http\Controllers\Catalog\IndexController;
use App\Http\Controllers\Catalog\CreateController;
use App\Http\Controllers\Catalog\ShowController;
use App\Http\Controllers\Catalog\StoreController;
use App\Http\Controllers\Catalog\UpdateController;
use App\Http\Controllers\Catalog\EditController;
use App\Http\Controllers\Catalog\DestroyController;
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

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

});
Route::group(['namespace' => 'Catalog', 'middleware', 'jwt.auth'], function ()
{
    Route::get('/cat', [IndexController::class, '__invoke']);
    Route::get('/cat/create', [CreateController::class, '__invoke']);
    Route::post('/cat', [StoreController::class, '__invoke']);
    Route::get('/cat/{post}', [ShowController::class, '__invoke']);
    Route::get('/cat/{post}/edit', [EditController::class, '__invoke']);
    Route::patch('/cat/{post}', [UpdateController::class, '__invoke']);
    Route::delete('/cat/{post}', [DestroyController::class, '__invoke']);
});
