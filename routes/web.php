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
})->name('homepage');
Route::get('/signup', function () {
    return view('signup');
})->name('signupform');
Route::get('/loginform', function () {
    return view('login');
})->name('loginform');



Route::post('/register', [App\Http\Controllers\user_cont::class, 'store'])->name('reg');
Route::post('/login', [App\Http\Controllers\user_cont::class, 'login'])->name('login');
Route::get('/updateuserform', [App\Http\Controllers\user_cont::class, 'show_updateuser_form'])->name('updateuserform');
Route::post('/updateuser', [App\Http\Controllers\user_cont::class, 'updateuser'])->name('updateuser');
Route::post('/deleteuser', [App\Http\Controllers\user_cont::class, 'deleteuser'])->name('deleteuser');

Route::get('/addproductform', function () {
    return view('addproduct');
})->name('addproductform');

Route::post('/addprod', [App\Http\Controllers\prod_cont::class, 'addprod'])->name('addprod');

Route::get('/deleteuserform', function () {
    return view('deleteuser');
})->name('deleteuserform');


