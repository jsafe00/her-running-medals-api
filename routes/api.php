<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MedalController;
use App\Http\Controllers\EventCommentController;
use App\Http\Controllers\MedalCommentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'events',
    'as' => 'events.',
], function() {
    Route::get('', [EventController::class, 'list'])->name('list');
    Route::post('', [EventController::class, 'create'])->name('create');
    Route::get('{event}', [EventController::class, 'show'])->name('show');
    Route::put('{event}', [EventController::class, 'update'])->name('update');
    Route::delete('{event}', [EventController::class, 'destroy'])->name('destroy');

    Route::group([
        'prefix' => '{event}/comments',
        'as' => 'comments.',
    ], function() {
        Route::get('', [EventCommentController::class, 'list'])->name('list');
        Route::post('', [EventCommentController::class, 'create'])->name('create');
        Route::put('{comment}', [EventCommentController::class, 'update'])->name('update');
        Route::delete('{comment}', [EventCommentController::class, 'destroy'])->name('destroy');
    });
});

Route::group([
    'prefix' => 'medals',
    'as' => 'medals.',
], function() {
    Route::get('', [MedalController::class, 'list'])->name('list');
    Route::post('', [MedalController::class, 'create'])->name('create');
    Route::get('{medal}', [MedalController::class, 'show'])->name('show');
    Route::put('{medal}', [MedalController::class, 'update'])->name('update');
    Route::delete('{medal}', [MedalController::class, 'destroy'])->name('destroy');

    Route::group([
        'prefix' => '{medal}/comments',
        'as' => 'comments.',
    ], function() {
        Route::get('', [MedalCommentController::class, 'list'])->name('list');
        Route::post('', [MedalCommentController::class, 'create'])->name('create');
        Route::put('{comment}', [MedalCommentController::class, 'update'])->name('update');
        Route::delete('{comment}', [MedalCommentController::class, 'destroy'])->name('destroy');
    });
});
