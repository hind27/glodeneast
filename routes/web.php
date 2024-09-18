<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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


// Route::group(['middleware' => ['auth', 'verified']], function () {
//     Route::get('register-step-two', [RegisterStepTwoController::class, 'create'])->name('register_step_two.create');

//     Route::group(['middleware' => 'registrationCompleted'], function () {
//         Route::get('/', [HomeController::class, 'index'])->name('dashboard');
//         Route::prefix('hr')->middleware('hr')->group(function () {
//             Route::get('/', [HomeController::class, 'dashboard'])->name('hr.dashboard');
//         });
//     });
// });
// Route::group(['middleware' => ['role:Super Admin']], function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
// });
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');


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
