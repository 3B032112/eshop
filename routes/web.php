<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::resource('cart_items', CartItemController::class)->middleware(['auth', 'verified']);
route::resource('orders', OrderController::class)->middleware(['auth', 'verified']);
/*
php artisan route:list 
+--------+-----------+------------------------+------------------+------------------------------------------------+------------+
  GET|HEAD        Products ........................................................................................................................................................................ Products.index › ProductController@index
  POST            Products ........................................................................................................................................................................ Products.store › ProductController@store
  GET|HEAD        Products/create ............................................................................................................................................................... Products.create › ProductController@create
  GET|HEAD        Products/{Product} ................................................................................................................................................................ Products.show › ProductController@show
  PUT|PATCH       Products/{Product} ............................................................................................................................................................ Products.update › ProductController@update
  DELETE          Products/{Product} .......................................................................................................................................................... Products.destroy › ProductController@destroy
  GET|HEAD        Products/{Product}/edit ........................................................................................................................................................... Products.edit › ProductController@edit
+--------+-----------+------------------------+------------------+------------------------------------------------+------------+
路由名稱           | URL                      | 對應的控制器方法     | Restful 方法 | 路由作用
products.index    |/products                 | GET                 | HEAD        | 顯示所有產品資料
products.show     |/products/{Product}       | GET                 | HEAD        | 顯示單一產品資料
products.create   |/products/create          | GET                 | HEAD        | 顯示新增產品的表單
products.store    |/products                 | POST                | POST        | 儲存新增的產品
products.edit     |/products/{Product}/edit  | GET                 | HEAD        | 顯示編輯產品的表單
products.update   |/products/{Product}       | PUT                 | PATCH       | 儲存編輯的產品資料
products.destroy  |/products/{Product}       | DELETE              | DELETE      | 刪除產品資料

*/

require __DIR__ . '/auth.php';
