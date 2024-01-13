<?php

use App\Http\Controllers\CoffeDrinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DrinkController;
use App\Http\Controllers\MilkDrinkController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\TeaDrinkController;

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

Route::prefix('drinks')->group(function ()
{
    Route::get('/show', [DrinkController::class, 'index']);

    Route::get('/show/{id}', [DrinkController::class, 'show']);

    Route::post('/post', [DrinkController::class, 'store']);

    Route::post('/update/{id}', [DrinkController::class, 'update']);

    Route::delete('/delete/{id}', [DrinkController::class, 'destroy']);
});

Route::prefix('snacks')->group(function ()
{
    Route::get('/show', [SnackController::class, 'index']);

    Route::get('/show/{id}', [SnackController::class, 'show']);

    Route::post('/post', [SnackController::class, 'store']);

    Route::post('/update/{id}', [SnackController::class, 'update']);

    Route::delete('/delete/{id}', [SnackController::class, 'destroy']);
});

Route::prefix('nontea')->group(function ()
{
    Route::get('/show', [CoffeDrinkController::class, 'index']);

    Route::get('/show/{id}', [CoffeDrinkController::class, 'show']);

    Route::post('/post', [CoffeDrinkController::class, 'store']);

    Route::post('/update/{id}', [CoffeDrinkController::class, 'update']);

    Route::delete('/delete/{id}', [CoffeDrinkController::class, 'destroy']);
});

Route::prefix('milk')->group(function ()
{
    Route::get('/show', [MilkDrinkController::class, 'index']);

    Route::get('/show/{id}', [MilkDrinkController::class, 'show']);

    Route::post('/post', [MilkDrinkController::class, 'store']);

    Route::post('/update/{id}', [MilkDrinkController::class, 'update']);

    Route::delete('/delete/{id}', [MilkDrinkController::class, 'destroy']);
});

Route::prefix('tea')->group(function ()
{
    Route::get('/show', [TeaDrinkController::class, 'index']);

    Route::get('/show/{id}', [TeaDrinkController::class, 'show']);

    Route::post('/post', [TeaDrinkController::class, 'store']);

    Route::post('/update/{id}', [TeaDrinkController::class, 'update']);

    Route::delete('/delete/{id}', [TeaDrinkController::class, 'destroy']);
});
