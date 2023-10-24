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
})->name('home');
Route::get('/dd', function () {
    return view('dd');
})->name('dash');

Route::get('/addproduct', function () {
    return view('add__product');
})->name('addproduct');

Route::get('/disproduct', function () {
    return view('dis__product');
})->name('disproduct');

Route::get('/disproduct', [App\Http\Controllers\prod_cont::class, 'displayproduct'])->name('disproduct');
Route::get('/signup', function () {
    return view('signup');
})->name('signupform');
Route::get('/logout', [App\Http\Controllers\user_cont::class, 'logout'])->name('logout');

Route::get('/loginform', function () {
    return view('login');
})->name('loginform');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/allprod', [App\Http\Controllers\prod_cont::class, 'displayproductuser'])->name("produser");
Route::post('/isuniqueemail/{email}', [App\Http\Controllers\user_cont::class, 'isUniqueEmail'])->name("isuniqueemail");


Route::get('/dis_users', [App\Http\Controllers\user_cont::class, 'disusers'])->name('dis_users');





Route::post('/register', [App\Http\Controllers\user_cont::class, 'store'])->name('reg');
Route::post('/login', [App\Http\Controllers\user_cont::class, 'login'])->name('login');
Route::get('/updateuserform', [App\Http\Controllers\user_cont::class, 'show_updateuser_form'])->name('updateuserform');
Route::get('/updateuserform/{id}', [App\Http\Controllers\user_cont::class, 'admin_show_updateuser_form'])->name('adminupdateuserform');
Route::post('/updateuser', [App\Http\Controllers\user_cont::class, 'updateuser'])->name('updateuser');
Route::post('/deleteuser', [App\Http\Controllers\user_cont::class, 'deleteuser'])->name('deleteuser');

Route::get('/addproductform', function () {
    return view('addproduct');
})->name('addproductform');

Route::post('/addprod', [App\Http\Controllers\prod_cont::class, 'addprod'])->name('addprod');

Route::get('/deleteuserform', function () {
    return view('deleteuser');
})->name('deleteuserform');

Route::get('/displayprod', [App\Http\Controllers\prod_cont::class, 'displayproducts'])->name('displayproducts');

Route::get('/displayprods', [App\Http\Controllers\prod_cont::class, 'displayproductuser'])->name('displayproducts');

Route::get('/delete/{id}', [App\Http\Controllers\prod_cont::class, 'deleteprod'])->name('deleteprod');
Route::get('/edit/{id}', [App\Http\Controllers\prod_cont::class, 'editprodform'])->name('editprodform');



Route::post('/editproduct/{id}', [App\Http\Controllers\prod_cont::class, 'update'])->name('editprod');



Route::get('/AddToCart/{id}', [App\Http\Controllers\cart_cont::class, 'addtocart'])->name('addtocart');



Route::get('/displayCart', [App\Http\Controllers\cart_cont::class, 'showUserCart'])->name('displaycart');



Route::post('/update-cart/{product}', [App\Http\Controllers\cart_cont::class, 'updateCart'])->name('update.cart');



Route::get('/deleteCart/{id}', [App\Http\Controllers\cart_cont::class, 'deletecart'])->name('deletecart');
