<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('main');
});

// Route::get('/about', function () {
//     return view('about');
// });


Auth::routes();

// FrontEnd Controller Routes
Route::get('/home', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'index']);
Route::get('/about', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'contact']);
Route::get('/categories', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'categories']);
Route::get('/faq', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'faq']);
Route::get('category/{category_name}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'viewCategoryPost']);
Route::get('category/{category_name}/{post_name}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'viewPost']);

// Comment Controller
Route::post('comments', [App\Http\Controllers\FrontEnd\CommentController::class, 'store']);
Route::post('/delete-comment', [App\Http\Controllers\FrontEnd\CommentController::class, 'delete']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    // Dashboard Controller Routes
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // Category Controller Routes
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

    // Post Controller Routes
    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
    Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'delete']);


    // User Controller Routes
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
});
