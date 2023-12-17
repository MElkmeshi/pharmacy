<?php

use App\Http\Controllers\ChatController;

use App\Http\Controllers\PaymobController;
use App\Http\Controllers\prod_cont;
use App\Http\Controllers\user_cont;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRolePermissionController;
use Illuminate\Support\Facades\URL;

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

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
Route::get('/test', [App\Http\Controllers\ChatController::class, 'test']);


Route::get('/', function () {
    return view('home');
})->name('home');
Route::post('/register', [App\Http\Controllers\user_cont::class, 'store'])->name('reg');
Route::get('/signup', function () {
    return view('signup');
})->name('signupform');
Route::post('/isuniqueemail/{email}', [App\Http\Controllers\user_cont::class, 'isUniqueEmail'])->name("isuniqueemail");
Route::post('/login', [App\Http\Controllers\user_cont::class, 'login'])->name('login');
Route::get('/loginform', function () {
    return view('login');
})->name('loginform');
Route::get('/displayprods', [App\Http\Controllers\prod_cont::class, 'displayproductuser'])->name('displayproducts');
Route::get('/logout', [App\Http\Controllers\user_cont::class, 'logout'])->name('logout');
Route::get('/disproduct', [App\Http\Controllers\prod_cont::class, 'displayproduct'])->name('disproduct');
Route::get('/product/{id}', [App\Http\Controllers\prod_cont::class, 'productDetails'])->name('productdetails');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/allprod', [App\Http\Controllers\prod_cont::class, 'displayproductuser'])->name("produser");
Route::get('/allprod/{category}', [App\Http\Controllers\prod_cont::class, 'displayproductuserByCategory'])->name("produsercategory");
Route::group(['middleware' => 'isloggedin'],function () {
    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/sendmessage', [ChatController::class, 'sendmessage']);
    Route::post('/sendimage', [ChatController::class, 'image']);
    Route::get('/updateuserform', [App\Http\Controllers\user_cont::class, 'show_updateuser_form'])->name('updateuserform');
    Route::post('/updateuser', [App\Http\Controllers\user_cont::class, 'updateuser'])->name('updateuser');

    Route::get('/AddToCart/{id}', [App\Http\Controllers\cart_cont::class, 'addtocart'])->name('addtocart');
    Route::get('/displayCart', [App\Http\Controllers\cart_cont::class, 'showUserCart'])->name('displaycart');
    Route::get('/deleteCart/{id}', [App\Http\Controllers\cart_cont::class, 'deletecart'])->name('deletecart');
    Route::get('/deleteuserform', function () {
        return view('deleteuser');
    })->name('deleteuserform');
    Route::post('/update-cart/{product}', [App\Http\Controllers\cart_cont::class, 'updateCart'])->name('update.cart');
});
Route::group(['middleware' => 'isadmin'],function () {
    Route::get('/displayprod', [App\Http\Controllers\prod_cont::class, 'displayproducts'])->name('displayproducts');
    Route::get('/messages', [ChatController::class, 'messages']);

    Route::get('/test/test/test', [App\Http\Controllers\ChatController::class, 'test']);
    Route::get('/chats', [ChatController::class, 'chats'])->name("chats");
    Route::post('/addprod', [App\Http\Controllers\prod_cont::class, 'addprod'])->name('addprod');
    Route::get('/addprod', function () {
        return view('add__product');
    })->name('addproduct');
    Route::get('/updateuserform/{id}', [App\Http\Controllers\user_cont::class, 'admin_show_updateuser_form'])->name('adminupdateuserform');
    Route::post('/updateuserform/{id}', [App\Http\Controllers\user_cont::class, 'admin_updateuser'])->name('adminupdateuser');
    Route::get('/delete/{id}', [App\Http\Controllers\prod_cont::class, 'deleteprod'])->name('deleteprod');
    Route::get('/edit/{id}', [App\Http\Controllers\prod_cont::class, 'editprodform'])->name('editprodform');
    Route::post('/editproduct/{id}', [App\Http\Controllers\prod_cont::class, 'update'])->name('editprod');
    Route::get('/dis_users', [App\Http\Controllers\user_cont::class, 'disusers'])->name('dis_users');
    Route::post('/deleteuser', [App\Http\Controllers\user_cont::class, 'deleteuser'])->name('deleteuser');
    Route::get('/dashboard', [App\Http\Controllers\user_cont::class, 'getLast8Orders'])->name('dash');
    Route::get('/orders',[App\Http\Controllers\order_cont::class, 'getAllOrdersWithUsers'])->name('orders_admin');



    //     Route::get('/admin/roles-permissions', [AdminRolePermissionController::class, 'index']);
    //     Route::post('/admin/roles', [AdminRolePermissionController::class, 'createRole'])->name('admin.createRole');
    //     Route::post('/admin/permissions', [AdminRolePermissionController::class, 'createPermission']);



    // Route::get('/admin/roles/{role}/edit', [AdminRolePermissionController::class, 'editRole'])->name('admin.roles_permissions.edit_role');
    // Route::post('/admin/roles/{role}/update', [AdminRolePermissionController::class, 'updateRole'])->name('admin.roles_permissions.update_role');
    // Route::get('/admin/roles/{role}/assign-permissions', [AdminRolePermissionController::class, 'assignPermissionToRole'])->name('admin.roles_permissions.assign_permissions');
    // Route::get('/admin/roles/{role}/assign-role', [AdminRolePermissionController::class, 'assignRoleToUser'])->name('admin.roles_assign_user');


});

Route::get('/makeorder/{id}/{cart_id}', [App\Http\Controllers\order_cont::class, 'makeorder'])->name('order');
Route::get('/confirmorder/{product_id}/{cart_id}', [App\Http\Controllers\order_cont::class, 'createorder'])->name('confirm_order');
Route::get('/displayOrders', [App\Http\Controllers\order_cont::class, 'getUserOrders'])->name('displayorders');
Route::get('/cancelorder/{order_id}', [App\Http\Controllers\order_cont::class, 'UserCancelOrder'])->name('cancelorder');
Route::get('/makeorderAll', [App\Http\Controllers\order_cont::class, 'makeorderall'])->name('orderall');
Route::get('/confirmorderAll', [App\Http\Controllers\order_cont::class, 'createorderall'])->name('confirm_order_all');
Route::get('/changestatus/{order_id}/{button_name}', [App\Http\Controllers\order_cont::class, 'changeOrderStatus'])->name('order.action');





//Paymob Routes
Route::post('/credit', [PaymobController::class, 'credit'])->name('checkout'); // this route send all functions data to paymob
Route::get('/callback', [PaymobController::class, 'callback'])->name('callback'); // this route get all reponse data to paymob
Route::post('/ajaxsearch', [prod_cont::class,"search"])->name('ajaxsearch');
Route::post('/ajaxsearchadmin', [prod_cont::class,"searchadmin"])->name('ajaxsearchadmin');
Route::post('/ajaxadminsearchuser', [user_cont::class,"ajaxadminsearchuser"])->name('ajaxadminsearchuser');


// Route::get('/admin/roles-permissions', [AdminRolePermissionController::class, 'index']);
Route::post('/admin/roles', [AdminRolePermissionController::class, 'assignPermissionToRole'])->name('admin.roles');

Route::get('/admin/create-role', [AdminRolePermissionController::class, 'viewCreateRole'])->name('admin.create.role');
Route::get('/admin/Assign-role', [AdminRolePermissionController::class, 'viewAssign_role_to_user'])->name('admin.Assign.role.user');
Route::post('/admin/assign-role-to-user', [AdminRolePermissionController::class, 'assignRoleToUser'])
    ->name('admin.assignRoleToUser');

// Route::get('/admin/edit-role', [AdminRolePermissionController::class, 'vieweditrole'])->name('admin.edit.role');

// Route::post('roles/edit-name', [AdminRolePermissionController::class, 'editRoleName'])->name('admin.roles.editName');

Route::get('/admin/delete-role', [AdminRolePermissionController::class, 'viewdeleterole'])->name('admin.delete.role');
Route::delete('roles/delete', [AdminRolePermissionController::class, 'deleteRole'])->name('admin.roles.delete');



// Route::middleware(['checkPermission:Add_Product'])->group(function ()  {
//     Route::post('/addprod', [App\Http\Controllers\prod_cont::class, 'addprod'])->name('addprod');
//     Route::get('/addprod', function () {
//         return view('add__product');
//     })->name('addproduct');
// });



// EAV MODEL ROUTES

Route::get('/new', [App\Http\Controllers\PaymentMethodController::class, 'index'])->name('new');
Route::get('/specific_payment', [App\Http\Controllers\PaymentMethodController::class, 'handleFormSubmission'])->name('specific_payment');
Route::post('/testpayment', [App\Http\Controllers\PaymentMethodController::class, 'store_values'])->name('testpayment');
////
Route::middleware(['checkPermission:Add_Product'])->group(function ()  {

Route::get('/admin/edit-role', [AdminRolePermissionController::class, 'vieweditrole'])->name('admin.edit.role');

Route::post('roles/edit-name', [AdminRolePermissionController::class, 'editRoleName'])->name('admin.roles.editName');
});

Route::get('/receive', [App\Http\Controllers\PusherController::class, 'receive']);
Route::get('/brodcast', [App\Http\Controllers\PusherController::class, 'brodcast']);
Route::get('/testtt', [App\Http\Controllers\PusherController::class, 'test']);

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
