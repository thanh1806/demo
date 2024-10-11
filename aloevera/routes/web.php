<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Api\HomeController as ApiHome;
use App\Http\Controllers\Users\ProductDetailController;
use App\Http\Controllers\Users\ProductsByCategoryController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\CategoriesAdminController;
use App\Http\Controllers\Admin\LoginAdminController;

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

//Route users
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/detail/{id}',[ProductDetailController::class,'detail_product'])->name('detail');
Route::get('/categories/{id}',[ProductsByCategoryController::class,'index'])->name('products.by.category');

Route::post('/login',[LoginAdminController::class,'CheckLogin'])->name('login');
Route::get('/logout',[LoginAdminController::class,'logout'])->name('logout');
Route::get('/chinh-sach',[HomeController::class,'chinh_sach_index'])->name('chinh-sach');
Route::get('/tin-tuc',[HomeController::class,'tin_tuc_index'])->name('tin-tuc');
Route::get('/tuan-thanh',[HomeController::class,'tuan_thanh_index'])->name('tuan-thanh');
Route::get('/cart',[HomeController::class,'cart_index'])->name('cart');
// admin
Route::prefix('dashboard')->middleware('admin')->group(function(){
    // product
    Route::get('/product',[HomeAdminController::class,'index'])->name("admin.product");
    Route::get('/product/add',[HomeAdminController::class,'index_add'])->name("admin.product.add");
    Route::post('/product/add',[HomeAdminController::class,'add_post'])->name("admin.product.add.post");
    Route::get('/product/edit/{id}',[HomeAdminController::class,'index_edit'])->name("admin.product.edit");
    Route::post('/product/edit',[HomeAdminController::class,'edit_post'])->name("admin.product.edit.post");
    Route::post('/product/delete',[HomeAdminController::class,'delete'])->name("admin.product.delete");
    //xóa ảnh trong product
    //Route::post('/product/delete-image',[ApiHome::class,'delete_image'])->name("admin.delete.image");
    Route::post('/product/update-active',[ApiHome::class,'update_active'])->name("admin.update.active");
    
    // category
    Route::get('/categories',[CategoriesAdminController::class,'index'])->name("admin.categories");
    Route::get('/categories/add',[CategoriesAdminController::class,'index_add'])->name("admin.categories.add");
    Route::post('/categories/add',[CategoriesAdminController::class,'add_post'])->name("admin.categories.add.post");
    Route::get('/categories/edit/{id}',[CategoriesAdminController::class,'index_edit'])->name("admin.categories.edit");
    Route::post('/categories/edit',[CategoriesAdminController::class,'edit_post'])->name("admin.categories.edit.post");
    Route::post('/categories/delete',[CategoriesAdminController::class,'delete'])->name("admin.categories.delete");
});


