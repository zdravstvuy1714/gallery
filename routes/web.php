<?php

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

// Home
Route::get('/', 'HomeController@home')->name('home');

// Rules
Route::get('/rules', function() {return 'Rules.';})->name('rules');

// Authentication
Route::namespace('Auth')->group(function () {
    // Registration
    Route::get('/registration', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/registration', 'RegisterController@register');

    // Login
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');

    // Logout
    Route::post('/logout', 'LoginController@logout')->name('logout');

    // Forgot password
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');

    // Reset password
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});

// Profile
Route::namespace('Profile')->group(function () {
    Route::get('/profile', 'ProfileController@show')->name('profile');
    Route::patch('/profile', 'ProfileController@update');

    Route::get('/profile/security', 'SecurityController@show')->name('profile.security');
    Route::patch('/profile/security', 'SecurityController@update');
});

// Wallpapers
Route::resource('wallpapers', 'WallpapersController')->except(['index']);
Route::get('/wallpapers/author/{user}', 'WallpapersController@author')->name('wallpapers.author');
Route::get('/wallpapers/categories/{category}', 'WallpapersController@category')->name('wallpapers.category');

// Categories
Route::get('/categories', 'CategoriesController@index')->name('categories.index');
