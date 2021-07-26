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

Route::get('/', function () {
    return view('welcome');
});

$router->get('/menu', 'MenuController@getMenu');

$router->get('/category-menu', 'MenuController@getCategoryMenu');

$router->get('/menu-category', 'MenuController@getMenuCategory');

$router->get('/notification', 'OrderController@notification');