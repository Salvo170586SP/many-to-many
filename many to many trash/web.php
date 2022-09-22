<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Hobby;

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
    return view('welcome');
});

Route::get('/users', function () {
    // return User::find(1)->hobbies;
    // return User::with('hobbies')->get();    
});


Route::get('/new', function(){
    $user = User::find(3);
    $hobby = Hobby::find(2);

    // return $user->hobbies()->attach($hobby->id);
    return $user->hobbies()->attach($hobby->id, ['created_at' => now(), 'updated_at' => now() ] );
});

Route::get('/delete', function(){
    $user = User::find(3);
    $hobby = Hobby::find(3);


    // detachare uno
    // return $user->hobbies()->detach($hobby->id);
    // detacharli tutti
    // return $user->hobbies()->detach();
    // detach massivo con array
    return $user->hobbies()->detach([1,2]);
});

Route::get('/update', function(){
    $user = User::find(3);
    $hobby = Hobby::find(1);


    // sincronizzarne uno
    // return $user->hobbies()->sync($hobby->id);
    // sincronizzione massiva con arrai
    // return $user->hobbies()->sync([2,3]);
    // sinconizzare senza interferire con gli altri
    return $user->hobbies()->syncWithoutDetaching([2,3]);
});
