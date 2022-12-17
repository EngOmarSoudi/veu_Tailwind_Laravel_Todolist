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
//        return Inertia::render('myvue/my',[
//       'o' => "title",
//
//   ]);
//    })->name('vue');
Route::post('register', [\App\Http\Controllers\Api\loginUsers::class,'createUser']);
Route::post('login', [\App\Http\Controllers\Api\loginUsers::class,'loginUser']);

//Route::apiResource('test', '\App\Http\Controllers\Api\TestController')
//    ->middleware('auth:sanctum');
//axios->middleware('auth:sanctum')
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('get-tasks',[\App\Http\Controllers\Api\TaskApiController::class,'index'])->name('index');
    Route::post('store',[\App\Http\Controllers\Api\TaskApiController::class,'store'])->name('store');
    Route::put('{id}',[\App\Http\Controllers\Api\TaskApiController::class,'update'])->name('update');
    Route::delete('delete/{id}',[\App\Http\Controllers\Api\TaskApiController::class,'delete'])->name('delete');
});
