<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\UserController;

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
    return view('home');
});


Route::prefix('users')->name('users.')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('index');


    Route::prefix('hobbies')->name('hobbies.')->group(function () {
        Route::get('showHobbies/{id}', [HobbyController::class, 'showHobbies'])->name('showHobbies');
        Route::get('detachHobbies/{id}/{user}',[HobbyController::class, 'detachHobby'])->name('detachHobby');
        Route::get('detachAllHobbies/{user}',[HobbyController::class, 'detachAllHobbies'])->name('detachAllHobbies');
        Route::get('addHobbies',[HobbyController::class, 'addHobbies'])->name('addHobbies');
        /* Route::get('editHobby/{id}/{user}',[HobbyController::class, 'editHobby'])->name('editHobby'); */
    });
});
