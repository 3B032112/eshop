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
Route::resource("Products", ProductController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

/*
  GET|HEAD        Products ........................................................................................................................................................................ Products.index › ProductController@index
  POST            Products ........................................................................................................................................................................ Products.store › ProductController@store
  GET|HEAD        Products/create ............................................................................................................................................................... Products.create › ProductController@create
  GET|HEAD        Products/{Product} ................................................................................................................................................................ Products.show › ProductController@show
  PUT|PATCH       Products/{Product} ............................................................................................................................................................ Products.update › ProductController@update
  DELETE          Products/{Product} .......................................................................................................................................................... Products.destroy › ProductController@destroy
  GET|HEAD        Products/{Product}/edit ........................................................................................................................................................... Products.edit › ProductController@edit

路由名稱           | URL                      | 對應的控制器方法     | Restful 方法 | 路由作用
products.index    |/products                 | GET                 | HEAD        | 顯示所有產品資料
products.show     |/products/{Product}       | GET                 | HEAD        | 顯示單一產品資料
products.create   |/products/create          | GET                 | HEAD        | 顯示新增產品的表單
products.store    |/products                 | POST                | POST        | 儲存新增的產品
products.edit     |/products/{Product}/edit  | GET                 | HEAD        | 顯示編輯產品的表單
products.update   |/products/{Product}       | PUT                 | PATCH       | 儲存編輯的產品資料
products.destroy  |/products/{Product}       | DELETE              | DELETE      | 刪除產品資料

*/