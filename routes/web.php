<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\User\UserCartController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PostController::class, 'cart_view']);

Route::get('/cart', [UserCartController::class, 'cart_view_user'])->name('cart-view');


Route::post('/add-to-cart/{product}', [UserCartController::class, 'addToCart'])->name('add-to-cart');


//product_details
Route::get('/products/{id}', [PostController::class, 'product_details'])->name('product_details');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.admin_dashboard'); // This should match the view file
})->middleware(['auth', 'verified'])->name('admin_dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/admin/products/store', [PostController::class, 'store'])->name('products.store');

Route::view('/admin/insert_products', 'admin.posts.insert_products')->name('admin.posts.insert_products');

Route::view('/admin/insert_categories', 'admin.posts.insert_categories')->name('admin.posts.insert_categories');

Route::post('/admin/products/categories', [PostController::class, 'categories'])->name('products.categories');

Route::view('/admin/view_categories', 'admin.posts.view_categories')->name('admin.posts.view_categories');

Route::view('/admin/insert_brands', 'admin.posts.insert_brands')->name('admin.posts.insert_brands');

Route::post('/admin/iproducts/brands', [PostController::class, 'brands'])->name('products.brands');

Route::view('/admin/view_brands', 'admin.posts.view_brands')->name('admin.posts.view_brands');
Route::view('/admin/all_orders', 'admin.posts.all_orders')->name('admin.posts.all_orders');
Route::view('/admin/all_payments', 'admin.posts.all_payments')->name('admin.posts.all_payments');
Route::view('/admin/list_users', 'admin.posts.list_users')->name('admin.posts.list_users');

//for view
Route::get('/admin/view_categories', [PostController::class, 'viewCategories'])->name('admin.posts.view_categories');
Route::get('/admin/insert_products', [PostController::class, 'viewCategoriesAndBrandsInto_insertProducts'])->name('admin.posts.insert_products');
Route::get('/admin/view_brands', [PostController::class, 'view_brands'])->name('admin.posts.view_brands');

require __DIR__.'/auth.php';
