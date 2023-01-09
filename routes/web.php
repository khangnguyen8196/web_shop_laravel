<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoriesController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontendController::class,'index'])->name('dashboard');

    Route::get('categories',[CategoriesController::class,'index'])->name('categories');
    Route::get('add-category',[CategoriesController::class,'add'])->name('addCategory');
    Route::post('insert-category',[CategoriesController::class,'insert'])->name('insertCategory');
    Route::get('edit-category/{id}',[CategoriesController::class,'edit'])->name('editCategory');
    Route::put('update-category/{id}',[CategoriesController::class,'update'])->name('updateCategory');
    Route::get('delete-category/{id}',[CategoriesController::class,'delete'])->name('deleteCategory');


});
