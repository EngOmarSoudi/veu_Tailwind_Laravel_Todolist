<?php

use App\Http\Controllers\Api\Tasks;
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
//Route::get('register',[Tasks::class ,''])->name('register');
//Route::post('login',[Tasks::class ,'loginUser'])->name('login');
//Route::post('register',[Tasks::class , 'createUser'])->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


//Route::get('/test',[\App\Http\Controllers\TaskController::class,'index'])->name("test");
////axios
//Route::post('store',[\App\Http\Controllers\TaskController::class,'store'])->name('store');
