<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Member\MemberLoginController;

use Illuminate\Http\Request;

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

    // Auth::routes(['verify' => true]);
    Auth::routes();

    // Customer
        Route::get('/register',[RegisterController::class,'loadRegister'])
        ->name('customer.register');
        Route::post('/customer/register',[RegisterController::class,'registered'])
        ->name('registered');

        Route::get('/', [HomeController::class, 'index'])->middleware('isCustomer')
        ->name('www.front.home');;
        Route::get('/login',[MemberLoginController::class,'showLogin'])
        ->name('customer.login');
        Route::post('customer-login',[MemberLoginController::class,'customerLogin'])
        ->name('customerLogin.post');
        Route::post('/logout',[MemberLoginController::class,'logout'])
        ->name('customer.logout');

  
    // admin 
        Route::get('admin/dashboard',[FrontendController::class,'index'])->middleware('isAdmin')->name('admin.dashboard');
    //admin login
        Route::get('admin/login', [AuthController::class, 'index'])->name('admin.login');
        Route::post('admin/login-post', [AuthController::class, 'postLogin'])->name('admin.login.post');
    // admin register
        Route::get('admin/register', [AuthController::class, 'registration'])->name('admin.register');
        Route::post('admin/register', [AuthController::class, 'postRegistration'])->name('admin.register.post'); 
        Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    //user
        Route::get('users',[UserController::class,'index'])
        ->name('admin.users');
        Route::get('users/list',[UserController::class,'getList'])
        ->name('admin.users.list');

    //update product by ajax

        Route::get('users/update-info-ajax',[UserController::class,'updateUserInfo'])
        ->name('admin.users.update_info');
        Route::get('add-user',[UserController::class,'add'])
        ->name('admin.user.get');
        Route::post('insert-user',[UserController::class,'insert'])
        ->name('add');
        Route::get('edit-user/{id}',[UserController::class,'edit'])
        ->name('admin.user.edit');
        Route::put('update-user/{id}',[UserController::class,'update'])
        ->name('update');

    //products
        Route::get('products',[ProductController::class,'index'])->name('admin.products');
        Route::get('products/list',[ProductController::class,'getList'])->name('admin.products.list');
    //update product by ajax
        Route::get('products/update-info-ajax',[ProductController::class,'updateProductInfo'])
        ->name('admin.products.update_info');
        Route::get('add-product',[ProductController::class,'add'])
        ->name('admin.product.get');
        Route::post('insert-product',[ProductController::class,'insert'])
        ->name('add');
        Route::get('edit-product/{id}',[ProductController::class,'edit'])
        ->name('admin.product.edit');
        Route::put('update-product/{id}',[ProductController::class,'update'])
        ->name('update');
    
    //categories
        Route::get('categories',[CategoriesController::class,'index'])
        ->name('categories');
        Route::get('add-category',[CategoriesController::class,'add'])
        ->name('admin.category.get');
        Route::post('insert-category',[CategoriesController::class,'insert'])
        ->name('insertCategory');
        Route::get('edit-category/{id}',[CategoriesController::class,'edit'])
        ->name('editCategory');
        Route::put('update-category/{id}',[CategoriesController::class,'update'])
        ->name('updateCategory');
        Route::get('delete-category/{id}',[CategoriesController::class,'delete'])
        ->name('deleteCategory');


        Route::get('blog',[BlogController::class,'index'])->name('blog.index');

    // logs
        Route::get('/logs', [LogsController::class, 'index'])->name('admin.log');
        Route::get('/logs/list', [LogsController::class, 'getlist'])->name('admin.log.list');


    // // login && register && email verification

    // Route::get('home', [AuthController::class, 'home'])->middleware(['auth', 'is_verify_email']);
    // Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
    // //forgotPassword
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');





