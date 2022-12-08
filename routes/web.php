<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\subcategoryController;
use App\Http\Controllers\Admin\postController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

// Category routes
Route::get('/category/index', [categoryController::class, 'index'])->name('category.index');
// create
Route::get('/category/create', [categoryController::class, 'create'])->name('category.create');
// store
Route::post('/category/store', [categoryController::class, 'store'])->name('category.store');
// edit
Route::get('/category/edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
// update
Route::post('/category/update/{id}', [categoryController::class, 'update'])->name('category.update');
// delete
Route::get('/category/delete/{id}', [categoryController::class, 'destroy'])->name('category.delete');

// sub category route

Route::get('/subcategory/index', [subcategoryController::class, 'index'])->name('subcategory.index');
// create
Route::get('/subcategory/create', [subcategoryController::class, 'create'])->name('subcategory.create');
// store
Route::post('/subcategory/store', [subcategoryController::class, 'store'])->name('subcategory.store');
// edit
Route::get('/subcategory/edit/{id}', [subcategoryController::class, 'edit'])->name('subcategory.edit');
// update
Route::post('/subcategory/update/{id}', [subcategoryController::class, 'update'])->name('subcategory.update');
// delete
Route::get('/subcategory/delete/{id}', [subcategoryController::class, 'destroy'])->name('subcategory.delete');

// post route
// index
Route::get('/post/index', [postController::class, 'index'])->name('post.index');
// index
Route::get('/post/view/{id}', [postController::class, 'view'])->name('post.view');
// create
Route::get('/post/create', [postController::class, 'create'])->name('post.create');
// store
Route::post('/post/store', [postController::class, 'store'])->name('post.store');
// edit
Route::get('/post/edit/{id}', [postController::class, 'edit'])->name('post.edit');
// update
Route::post('/post/update/{id}', [postController::class, 'update'])->name('post.update');
// delete
Route::get('/post/delete/{id}', [postController::class, 'destroy'])->name('post.delete');




















//  verification route system start
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// This route are show verfication page
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('/resend-email', [App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');

Route::get('/deposite/money', [App\Http\Controllers\HomeController::class, 'deposite'])->name('deposite.money')->middleware('verified');
// verification route system end

// change password
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'chenge_password'])->name('change.password')->middleware('verified');;

Route::post('/update-password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update.password')->middleware('verified');;
// end change password