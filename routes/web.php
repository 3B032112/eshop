<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource("Products", ProductController::class);

/*
  GET|HEAD        Products ........................................................................................................................................................................ Products.index › ProductController@index
  POST            Products ........................................................................................................................................................................ Products.store › ProductController@store
  GET|HEAD        Products/create ............................................................................................................................................................... Products.create › ProductController@create
  GET|HEAD        Products/{Product} ................................................................................................................................................................ Products.show › ProductController@show
  PUT|PATCH       Products/{Product} ............................................................................................................................................................ Products.update › ProductController@update
  DELETE          Products/{Product} .......................................................................................................................................................... Products.destroy › ProductController@destroy
  GET|HEAD        Products/{Product}/edit ........................................................................................................................................................... Products.edit › ProductController@edit

路由名稱           | URL                      | 對應的控制器方法     | Restful 方法
products.index    |/products                 | GET                 | HEAD       
products.show     |/products/{Product}       | GET                 | HEAD
products.create   |/products/create          | GET                 | HEAD
products.store    |/products                 | POST                | POST
products.edit     |/products/{Product}/edit  | GET                 | HEAD
products.update   |/products/{Product}       | PUT                 | PATCH
products.destroy  |/products/{Product}       | DELETE              | DELETE

*/