<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublicationController;

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

Route::post('/login', [LoginController::class, 'authenticate']);


/********************* Publication. *************************/
    Route::get('/publications', [PublicationController::class, 'index']);
    Route::post('/publications/show', [PublicationController::class, 'show']);
    Route::post('/publications', [PublicationController::class, 'store']);
    Route::put('/publications/update', [PublicationController::class, 'update']);
    Route::delete('/publications/destroy', [PublicationController::class, 'destroy']);

/***********************************************************/


/********************* Comments. *************************/
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/comments/show', [CommentController::class, 'show']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::put('/comments/update', [CommentController::class, 'update']);
    Route::delete('/comments/destroy', [CommentController::class, 'destroy']);
/***********************************************************/