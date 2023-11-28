<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:api'], static function () {
    Route::get('/me', [UserController::class, 'me']);

    Route::get('/movies', [MovieController::class, 'index']);
    Route::post('/movies', [MovieController::class, 'store']);
    Route::get('/movies/{movie}', [MovieController::class, 'show']);
    Route::put('/movies/{movie}', [MovieController::class, 'update']);
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy']);


    Route::post('/logout', [UserController::class, 'logout']);
});


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
