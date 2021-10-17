<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Product\MenController;
use App\Http\Controllers\Product\WomenController;
use App\Http\Controllers\Product\kidsController;



################################### Admin Rouotes ##################################
// start Page
Route::get('admin', [ProductController::class, 'show'])->middleware(['auth','can:isAdmin, App\MOdels\product'])->name('admin');

// Show Order Page and Delete Order
Route::get('admin/order', [ProductController::class, 'order'])->name('order');
Route::get('admin/order/{id}', [ProductController::class, 'delete'])->name('delete');


// Show and Create Form
Route::get('admin/product/create', [ProductController::class, 'index'])->name("productoperation");
Route::post('admin/product/create', [ProductController::class, 'store']);

// Edit and Upage Form
Route::get('admin/product/edit/{id}', [ProductController::class, 'edit'])->name("edit");
Route::post('admin/product/edit/{id}', [ProductController::class, 'update']);

// Delete Product
Route::get('admin/product/delete/{id}', [ProductController::class, 'destroy'])->name("destroy");





########################## Auth Controller ###########################
// Login
Route::get('login', [AuthController::class, 'login'])->name("login");
Route::post('login', [AuthController::class, 'check']);

// Registration
Route::get('register', [AuthController::class, 'register'])->name("register");
Route::post('register', [AuthController::class, 'store']);

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name("logout");

// Password Change
Route::get('password-change', [AuthController::class, 'passwrod_change'])->name('passwordchange');
Route::post('password-change', [AuthController::class, 'change_Password_confirm'])->name('passwordchangeconfirm');

// Password Reset
Route::get('forget-password', [AuthController::class, 'show_email_password_form'])->name('forgetpassword');
Route::post('forget-password', [AuthController::class, 'submit_forget_password_form']); 
Route::get('reset-password/{token}', [AuthController::class, 'show_Reset_Password_Form'])->name('forgetpasswordform');
Route::post('reset-password', [AuthController::class, 'submit_Reset_Password_Form']);


######################## Card Page and Address #######################
// Address Show and Save
Route::get('card', [AddressController::class, 'index'])->middleware('auth')->name("card");
Route::get('delete/{id}', [AddressController::class, 'delete'])->middleware('auth')->name("itemdel");
Route::post('card', [AddressController::class, 'address']);


####################### Men Page #############################
Route::get('men', [MenController::class, 'index'])->name("man");
Route::get('men/polos', [MenController::class, 'polos'])->name("polos");
Route::get('men/jeans', [MenController::class, 'jeans'])->name("menjeans");
Route::get('men/shoes', [MenController::class, 'shoe'])->name("shoe");


####################### Women Page #############################
Route::get('women', [WomenController::class, 'index'])->name("woman");
Route::get('women/jeans', [WomenController::class, 'jeans'])->name("jeans");
Route::get('women/tees', [WomenController::class, 'tees'])->name("tees");
Route::get('women/beauty', [WomenController::class, 'beauty'])->name("beauty");


####################### Kids Page #############################
Route::get('kids', [KidsController::class, 'index'])->name("kids");
Route::get('babies', [KidsController::class, 'babies'])->name("babies");
Route::get('boys', [KidsController::class, 'boys'])->name("boys");
Route::get('girls', [KidsController::class, 'girls'])->name("girls");



####################### Add To Card #######################
Route::get('addtocard/{id}', [ProductController::class, 'show_product'])->name("addtocard");
Route::post('addtocard/{id}', [ProductController::class, 'addtocard'])->middleware('auth');


################################ Payment getway #####################
Route::get('stripe-payment', [AddressController::class, 'handleGet']);
Route::post('stripe-payment', [AddressController::class, 'handlePost'])->name('stripepayment');
Route::get('confirm_order', [AddressController::class, 'confirm_order'])->name("cofirm");


Route::get('/', function () {
    return view('interface.navlinks.home');
})->name("home");
