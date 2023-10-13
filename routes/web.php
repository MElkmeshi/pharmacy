<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/loginform', function () {
    return view('login');
});


Route::post('/register', [App\Http\Controllers\user_cont::class, 'store'])->name('reg');
Route::post('/login', [App\Http\Controllers\user_cont::class, 'login'])->name('login');
Route::get('/updateuserform', [App\Http\Controllers\user_cont::class, 'show_updateuser_form']);
Route::post('/updateuser', [App\Http\Controllers\user_cont::class, 'updateuser'])->name('updateuser');
Route::post('/deleteuser', [App\Http\Controllers\user_cont::class, 'deleteuser'])->name('deleteuser');

Route::get('/deleteuserform', function () {
    return view('deleteuser');
});


