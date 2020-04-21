<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
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
    return view('pages/home');
});
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('products/category/{id}', 'ProductsController@getProductsByCategory');
Route::get('products/{id}', 'ProductsController@show')->name('product');
Auth::routes();


Route::middleware('auth')->group(function() {
    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');
});
Route::get('/moder-dashboard/{any}', 'Dashboards\ModerController@index')
    ->where('any', '.*')
    ->middleware('check-moder');
Route::get('/admin-dashboard/{any}', 'Dashboards\AdminController@index')
    ->where('any', '.*')
    ->middleware('check-admin');
Route::get('users', 'UsersController@index');
Route::put('update-user', 'UsersController@update');
Route::post('users/create', 'UsersController@store');
Route::delete('users/{id}', 'UsersController@destroy');

Route::get('get-categories', 'CategoriesController@indexDash');
Route::put('update-category', 'CategoriesController@update');
Route::post('update-image', 'CategoriesController@updateImage');
Route::post('categories/create', 'CategoriesController@store');
Route::delete('categories/{id}', 'CategoriesController@destroy');

Route::get('products', 'ProductsController@index');
Route::put('update-product', 'ProductsController@update');
Route::post('products/create', 'ProductsController@store');
Route::delete('products/{id}', 'ProductsController@destroy');

Route::post('orders', 'OrdersControllers@store');
//Route::post('orders', 'OrdersControllers@store');