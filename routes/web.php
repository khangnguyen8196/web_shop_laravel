<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontendController::class,'index'])->name('dashboard');

    Route::get('/users',[UserController::class,'index'])->name('user');
    
    //categories
    Route::get('categories',[CategoriesController::class,'index'])->name('categories');
    Route::get('add-category',[CategoriesController::class,'add'])->name('addCategory');
    Route::post('insert-category',[CategoriesController::class,'insert'])->name('insertCategory');
    Route::get('edit-category/{id}',[CategoriesController::class,'edit'])->name('editCategory');
    Route::put('update-category/{id}',[CategoriesController::class,'update'])->name('updateCategory');
    Route::get('delete-category/{id}',[CategoriesController::class,'delete'])->name('deleteCategory');
    //products
    Route::get('products',[ProductController::class,'index'])->name('products');
    Route::get('add-product',[ProductController::class,'add'])->name('addProduct');
    Route::post('insert-product',[ProductController::class,'insert'])->name('insertProduct');
    Route::get('edit-product/{id}',[ProductController::class,'edit'])->name('editProduct');
    Route::put('update-product/{id}',[ProductController::class,'update'])->name('updateProduct');
    Route::get('delete-product/{id}',[ProductController::class,'delete'])->name('deleteProduct');

});

// login && register && email verification
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home', [AuthController::class, 'home'])->middleware(['auth', 'is_verify_email']);
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
//forgotPassword
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

