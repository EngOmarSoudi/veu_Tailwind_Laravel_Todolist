<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//    Route::get('/test', function () {
//        return Inertia::render('myvue/my');
//    })->name('vue');


Route::get('/test',[\App\Http\Controllers\TaskController::class,'vue'])->name("vue");
//axios
Route::post('store',[\App\Http\Controllers\TaskController::class,'store'])->name('store');
//Route::put('/{id}',[\App\Http\Controllers\TaskController::class,'update'])->name('update');
//Route::delete('/{id}',[\App\Http\Controllers\TaskController::class,'delete'])->name('delete');

