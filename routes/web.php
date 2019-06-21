<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/about-us', 'HomeController@aboutUs');
Route::get('/contact-us', 'HomeController@contactUs');
Route::get('/product-list', 'HomeController@productList');
Route::get('/home', 'UserController@index')->name('home');
Route::get('/buy/{id}', 'HomeController@getBuy');
Route::get('/book/{id}', 'UserController@getBook');
Route::post('/book/{id}', 'UserController@storeBook');
Route::get('/history', 'UserController@getAllHistory');
Route::post('/verify-payment/{id}', 'UserController@storePaymentReceipt');
Route::get('/admin', 'ProductController@index');
Route::post('/contact-us', 'HomeController@storeContactUs');

Route::prefix('admin')->group(function () {
    Route::get('/', 'ProductController@index')->name('admin.dashboard');

    Route::post('product', 'ProductController@store');
    Route::patch('product/{id}', 'ProductController@update');
    Route::delete('product/{id}', 'ProductController@destroy');
    Route::get('verify', 'AdminController@indexVerify');
    Route::post('verify/{book_id}', 'AdminController@storeVerify');
    Route::get('history-transactions', 'AdminController@indexHistoryTransactions');
    Route::get('contact-us', 'AdminController@indexContactUs');

    Route::get('login', 'AdminLoginController@login')->name('admin.auth.login');
    Route::post('login', 'AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'AdminLoginController@logout')->name('admin.auth.logout');
    Route::get('change-language/{locale}','Admin\LanguageController@changeLang');
});

// Route::get('api/bookfield/getschedule/{id}','ProductOperationalHourController@getSchedule');



