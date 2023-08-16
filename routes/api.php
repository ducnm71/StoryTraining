<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\Text_ConfigController;
use App\Http\Controllers\TouchController;
use App\Http\Controllers\UserController;


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


Route::prefix('user')->group(function(){
    Route::post('/signup', [UserController::class, 'register']);

    Route::post('/signin', [UserController::class, 'login']);
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

Route::prefix('text')->group(function(){
    Route::get('/', [TextController::class, 'index']);

    Route::get('/{text_id}', [TextController::class, 'show']);

    Route::post('/', [TextController::class, 'create']);

    Route::put('/{text_id}', [TextController::class, 'update']);

    Route::delete('/{text_id}', [TextController::class, 'destroy']);
});


Route::prefix('audio')->group(function(){
    Route::get('/', [AudioController::class, 'index']);

    Route::get('/{audio_id}', [AudioController::class, 'show']);

    Route::post('/{text_id}', [AudioController::class, 'create']);

    Route::put('/{audio_id}', [AudioController::class, 'update']);

    Route::delete('/{audio_id}', [AudioController::class, 'destroy']);
});

Route::prefix('text_config')->group(function(){
    Route::get('/all/{page_id}', [Text_ConfigController::class, 'index']);

    Route::get('/{text_id}', [Text_ConfigController::class, 'show']);

    Route::post('/{page_id}/{text_id}', [Text_ConfigController::class, 'create']);

    Route::put('/{text_id}', [Text_ConfigController::class, 'update']);

    Route::delete('/{text_id}', [Text_ConfigController::class, 'destroy']);
});

Route::prefix('touch')->group(function(){
    Route::get('/all/{page_id}', [TouchController::class, 'index']);

    Route::get('/{text_id}', [TouchController::class, 'show']);

    Route::post('/{page_id}/{text_id}', [TouchController::class, 'create']);

    Route::put('/{text_id}', [TouchController::class, 'update']);

    Route::delete('/{text_id}', [TouchController::class, 'destroy']);
});
