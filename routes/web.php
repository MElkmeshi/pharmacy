<?php

use App\Http\Controllers\ChatController;

use App\Http\Controllers\PaymobController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\prod_cont;
use App\Http\Controllers\user_cont;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRolePermissionController;
use Illuminate\Support\Facades\URL;
// use App\Http\Controllers\Auth\ForgotPasswordController;




use App\Models\Menu;
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
Route::get('/testtt', [App\Http\Controllers\PusherController::class, 'test']);
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/chats/chat', function () {
    return view('chat');
})->name('chats');

//@todo: add them to a controller
Route::get('/signup', function () {
    return view('signup');
})->name('signupform');
Route::get('/loginform', function () {
    return view('login');
})->name('loginform');
Route::get('/deleteuserform', function () {
    return view('deleteuser');
})->name('deleteuserform');


//rendering navbar dynamically

Route::get('/', function () {
    $menuItems = Menu::with('children')->whereNull('parent_id')->get();
    return view('home',compact('menuItems'));

})->name('home');

Route::get('/contact', function () {
    $menuItems = Menu::with('children')->whereNull('parent_id')->get();
    return view('contact',compact('menuItems'));
})->name('contact');

Route::get('/about-us', function () {
    $menuItems = Menu::with('children')->whereNull('parent_id')->get();
    return view('about-us',compact('menuItems'));

})->name('about-us');






Route::post('/register', [App\Http\Controllers\user_cont::class, 'store'])->name('reg');
Route::post('/isuniqueemail/{email}', [App\Http\Controllers\user_cont::class, 'isUniqueEmail'])->name("isuniqueemail");
Route::post('/login', [App\Http\Controllers\user_cont::class, 'login'])->name('login');
Route::get('/displayprods', [App\Http\Controllers\prod_cont::class, 'displayproductuser'])->name('displayproducts');
Route::get('/logout', [App\Http\Controllers\user_cont::class, 'logout'])->name('logout');
Route::get('/disproduct', [App\Http\Controllers\prod_cont::class, 'displayproduct'])->name('disproduct');
Route::get('/product/{id}', [App\Http\Controllers\prod_cont::class, 'productDetails'])->name('productdetails');
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
    Route::post('/update-cart/{product}', [App\Http\Controllers\cart_cont::class, 'updateCart'])->name('update.cart');
});
//Order Routes
Route::get('/makeorder/{id}/{cart_id}', [App\Http\Controllers\order_cont::class, 'makeorder'])->name('order');
Route::get('/confirmorder/{product_id}/{cart_id}', [App\Http\Controllers\order_cont::class, 'createorder'])->name('confirm_order');
Route::get('/displayOrders', [App\Http\Controllers\order_cont::class, 'getUserOrders'])->name('displayorders');
Route::get('/cancelorder/{order_id}', [App\Http\Controllers\order_cont::class, 'UserCancelOrder'])->name('cancelorder');
Route::get('/makeorderAll', [App\Http\Controllers\order_cont::class, 'makeorderall'])->name('orderall');
Route::get('/confirmorderAll', [App\Http\Controllers\order_cont::class, 'createorderall'])->name('confirm_order_all');
//Paymob Routes
Route::post('/credit', [PaymobController::class, 'credit'])->name('checkout'); // this route send all functions data to paymob
Route::get('/callback', [PaymobController::class, 'callback'])->name('callback'); // this route get all reponse data to paymob
Route::post('/ajaxsearch', [prod_cont::class,"search"])->name('ajaxsearch');
Route::post('/ajaxsearchadmin', [prod_cont::class,"searchadmin"])->name('ajaxsearchadmin');
Route::post('/ajaxadminsearchuser', [user_cont::class,"ajaxadminsearchuser"])->name('ajaxadminsearchuser');

// EAV MODEL ROUTES
Route::get('/new', [App\Http\Controllers\PaymentMethodController::class, 'index'])->name('new');
Route::get('/specific_payment', [App\Http\Controllers\PaymentMethodController::class, 'handleFormSubmission'])->name('specific_payment');
Route::post('/store_payment', [App\Http\Controllers\PaymentMethodController::class, 'store_values'])->name('store_payment');


Route::middleware(['checkPermission:Add_Product'])->group(function ()  {
    Route::post('/addprod', [App\Http\Controllers\prod_cont::class, 'addprod'])->name('addprod');
    Route::get('/addprod', function () {
        return view('add__product');
    })->name('addproduct');
    Route::get('/displayprod', [App\Http\Controllers\prod_cont::class, 'displayproducts'])->name('displayproducts');
});
Route::middleware(['checkPermission:Delete_Product'])->group(function ()  {
    Route::get('/delete/{id}', [App\Http\Controllers\prod_cont::class, 'deleteprod'])->name('deleteprod');
});
Route::middleware(['checkPermission:Update_Product'])->group(function ()  {
    Route::get('/edit/{id}', [App\Http\Controllers\prod_cont::class, 'editprodform'])->name('editprodform');
    Route::post('/editproduct/{id}', [App\Http\Controllers\prod_cont::class, 'update'])->name('editprod');
});
Route::middleware(['checkPermission:Update_Order'])->group(function ()  {
Route::get('/changestatus/{order_id}/{button_name}', [App\Http\Controllers\order_cont::class, 'changeOrderStatus'])->name('order.action');
Route::get('/orders',[App\Http\Controllers\order_cont::class, 'getAllOrdersWithUsers'])->name('orders_admin');
});
Route::middleware(['checkPermission:Delete_Order'])->group(function ()  {
    Route::get('/changestatus/{order_id}/{button_name}', [App\Http\Controllers\order_cont::class, 'changeOrderStatus'])->name('order.action');
    Route::get('/orders',[App\Http\Controllers\order_cont::class, 'getAllOrdersWithUsers'])->name('orders_admin');
});
Route::middleware(['checkPermission:Live_Chat_With_User'])->group(function ()  {
    Route::get('/chats', [ChatController::class, 'chats'])->name("chats");
    Route::get('/messages', [ChatController::class, 'messages']);
});
Route::middleware(['checkPermission:Add_Permission'])->group(function ()  {
    Route::post('/admin/roles', [AdminRolePermissionController::class, 'assignPermissionToRole'])->name('admin.roles');
    Route::get('/admin/create-role', [AdminRolePermissionController::class, 'viewCreateRole'])->name('admin.create.role');
});
Route::middleware(['checkPermission:Update_Permission'])->group(function ()  {
    Route::post('/admin/roles', [AdminRolePermissionController::class, 'assignPermissionToRole'])->name('admin.roles');
    Route::get('/admin/Assign-role', [AdminRolePermissionController::class, 'viewAssign_role_to_user'])->name('admin.Assign.role.user');
    Route::post('/admin/assign-role-to-user', [AdminRolePermissionController::class, 'assignRoleToUser'])
    ->name('admin.assignRoleToUser');
    Route::get('/admin/edit-role', [AdminRolePermissionController::class, 'vieweditrole'])->name('admin.edit.role');
    Route::post('roles/edit-name', [AdminRolePermissionController::class, 'editRoleName'])->name('admin.roles.editName');
});
Route::middleware(['checkPermission:Delete_Permission'])->group(function ()  {
    Route::delete('roles/delete', [AdminRolePermissionController::class, 'deleteRole'])->name('admin.roles.delete');
    Route::get('/admin/delete-role', [AdminRolePermissionController::class, 'viewdeleterole'])->name('admin.delete.role');
});
Route::middleware(['checkPermission:Update_User'])->group(function ()  {
    Route::get('/updateuserform/{id}', [App\Http\Controllers\user_cont::class, 'admin_show_updateuser_form'])->name('adminupdateuserform');
    Route::post('/updateuserform/{id}', [App\Http\Controllers\user_cont::class, 'admin_updateuser'])->name('adminupdateuser');
});

Route::middleware(['checkPermission:Delete_User'])->group(function ()  {
    Route::post('/deleteuser', [App\Http\Controllers\user_cont::class, 'deleteuser'])->name('deleteuser');
});
Route::middleware(['checkPermission:Delete_User,Update_User'])->group(function ()  {
    Route::get('/dis_users', [App\Http\Controllers\user_cont::class, 'disusers'])->name('dis_users');
});
Route::middleware(['checkPermission:Delete_User,Update_User,Delete_Permission,Update_Permission,Add_Permission,Live_Chat_With_User,Add_Product,Update_Product,Update_Order,Delete_Order,Delete_Product'])->group(function ()  {
    Route::get('/dashboard', [App\Http\Controllers\user_cont::class, 'getLast8Orders'])->name('dash');
});
Route::middleware(['checkPermission:Delete_Permission,Update_Permission,Add_Permission'])->group(function ()  {
    Route::get('/admin/permission', [AdminRolePermissionController::class, 'viewpermission'])->name('admin.show.permission');
});
Route::middleware(['checkPermission:Add_Product,Update_Product,Delete_Product'])->group(function ()  {
Route::get('/displayprod', [App\Http\Controllers\prod_cont::class, 'displayproducts'])->name('displayproducts');
});

Route::get('/receive', [App\Http\Controllers\PusherController::class, 'receive']);
Route::get('/brodcast', [App\Http\Controllers\PusherController::class, 'brodcast']);
Route::get('/reset', function () {
    return view("resetpassword");
})->name("reset");
Route::get('/newpassword', function () {
    return view("newpassword");
})->name("newpassword");



Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgetPasswordController::class, 'sendResetLink'])->name('forgot-password_send-link');
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'resetWithToken'])->name('set_newpassword');
