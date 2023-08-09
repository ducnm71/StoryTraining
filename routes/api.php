<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('story')->group(function(){
    Route::get('/', [StoryController::class, 'index']);

    Route::post('/', [StoryController::class, 'store']);

    Route::get('/{story_id}', [StoryController::class, 'show']);

    Route::put('/{story_id}', [StoryController::class, 'update']);

    Route::delete('/{story_id}', [StoryController::class, 'destroy']);
});
