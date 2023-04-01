<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

//  front of the site
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// web is guard for patient
Auth::routes();
Route::prefix('/patient')->name('patient.')->group(function () {
    Route::post('/register/verify/otp', [App\Http\Controllers\Auth\RegisterController::class, 'verifyOTPPatient']);
    Route::get('/register/send/otp/{email}', [App\Http\Controllers\Auth\RegisterController::class, 'sendOTPPatient']);

    Route::middleware(['auth:web', 'checkstatus','isblocked'])->group(function () {
        Route::get('/', [App\Http\Controllers\Patient\HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [App\Http\Controllers\Patient\HomeController::class, 'index'])->name('dashboard');
    });
});

// doctor
Route::prefix('/doctor')->name('doctor.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Doctor\Auth\LoginController::class, 'showDoctorLoginForm'])->name('login.view');
    Route::post('/login', [App\Http\Controllers\Doctor\Auth\LoginController::class, 'doctorLogin'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Doctor\Auth\LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('/register', [App\Http\Controllers\Doctor\Auth\RegisterContoller::class, 'showDoctorRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Doctor\Auth\RegisterContoller::class, 'registerDoctor']);
    Route::post('/register/verify/otp', [App\Http\Controllers\Doctor\Auth\RegisterContoller::class, 'verifyOTPDoctor']);
    Route::get('/register/send/otp/{email}', [App\Http\Controllers\Doctor\Auth\RegisterContoller::class, 'sendOTPDoctor']);

    Route::get('/password/reset', [App\Http\Controllers\Doctor\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Doctor\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/password/reset/{token}', [App\Http\Controllers\Doctor\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Doctor\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    Route::middleware(['auth:doctor', 'checkstatus','isblocked'])->group(function () {
        Route::get('/', [App\Http\Controllers\Doctor\HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [App\Http\Controllers\Doctor\HomeController::class, 'index'])->name('dashboard');
    });
});

// admin
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    // logout
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    // login
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showAdminLoginForm'])->name('login.view');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'adminLogin'])->name('login');

    // dashboard
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');

        //profile
        Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [App\Http\Controllers\Admin\HomeController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/passwords', [App\Http\Controllers\Admin\HomeController::class, 'password'])->name('passwords');
        Route::post('/passwords/update', [App\Http\Controllers\Admin\HomeController::class, 'passwordUpdate'])->name('passwords.update');

        //category
        Route::prefix('/category')->name('category.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('list');
            Route::get('/add', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('add');
            Route::post('/insert', [App\Http\Controllers\Admin\CategoryController::class, 'insert'])->name('insert');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('delete');
        });

        // user
        Route::prefix('/user')->name('user.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('list');
            Route::get('/add', [App\Http\Controllers\Admin\UserController::class, 'add'])->name('add');
            Route::delete('/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete']);

            Route::get('/block/{id}/{status}', [App\Http\Controllers\Admin\UserController::class, 'block'])->name('block');
            Route::get('/approve/{id}', [App\Http\Controllers\Admin\UserController::class, 'approve'])->name('approve');
        });

        // doctor
        Route::prefix('/doctor')->name('doctor.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\DoctorController::class, 'index'])->name('list');
            Route::get('/add', [App\Http\Controllers\Admin\DoctorController::class, 'add'])->name('add');
            Route::delete('/delete/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'delete']);

            Route::get('/block/{id}/{status}', [App\Http\Controllers\Admin\DoctorController::class, 'block'])->name('block');
            Route::get('/approve/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'approve'])->name('approve');
        });

    });

});
