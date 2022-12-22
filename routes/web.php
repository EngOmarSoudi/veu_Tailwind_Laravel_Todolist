<?php

use App\Http\Controllers\Api\loginUsers;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::get('login',[])->name('login');
//Route::get('register',[loginUsers::class ,''])->name('register');
//Route::post('login',[loginUsers::class ,'loginUser'])->name('login');
//Route::post('register',[loginUsers::class , 'createUser'])->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('tasks',[\App\Http\Controllers\TaskController::class,'index'])->name("tasks");
Route::get('getTasks',[\App\Http\Controllers\TaskController::class,'getTasks'])->name("getTasks");
////axios
Route::post('store',[\App\Http\Controllers\TaskController::class,'store'])->name('store');
Route::delete('delete/{id}',[\App\Http\Controllers\TaskController::class,'delete'])->name('delete');
Route::put('{id}',[\App\Http\Controllers\TaskController::class,'update'])->name('edit');
Route::put('{id}',[\App\Http\Controllers\TaskController::class,'updatecheck'])->name('editcheck');