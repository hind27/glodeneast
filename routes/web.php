<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

// Route::group(['middleware' => ['role:Super Admin']], function () {
Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
// });
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
// Redirect root URL to the default locale (e.g., 'ar')

// Route::get('/', function () {
//     return redirect(app()->getLocale());
// });

Route::group(
    [
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-zA-Z]{2}'],
        'middleware' => 'setLang'
    ],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('about', [HomeController::class, 'about'])->name('about');

        Route::get('contact', [HomeController::class, 'contact'])->name('contact');
        Route::get('product', [HomeController::class, 'product'])->name('product');
        Route::get('store', [HomeController::class, 'store'])->name('store');
    }
);


// In routes/web.php
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.create');
    Route::post('admin/categories/add', [CategoryController::class, 'add'])->name('category.add');
    Route::delete('admin/categories/{categoryId}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('admin/categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('category.edit');



    Route::get('/admin/product/create', [ProductController::class, 'index'])->name('product.create');
    Route::post('admin/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::delete('admin/product/{productId}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('admin/product/{productId}/edit', [ProductController::class, 'edit'])->name('product.edit');
    // Route for viewing orders
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::put('/roles/{user}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/roles/permissions', [RoleController::class, 'permissionsIndex'])->name('roles.permissions');
    Route::put('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
});
