<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\PageController;

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

Route::prefix('page')->group(function(){
    Route::get('/all/{story_id}', [PageController::class, 'index']);

    Route::get('/{page_id}', [PageController::class, 'show']);

    Route::post('/{story_id}', [PageController::class, 'create']);

    Route::put('/{page_id}', [PageController::class, 'update']);

    Route::delete('/{page_id}', [PageController::class, 'destroy']);
});
