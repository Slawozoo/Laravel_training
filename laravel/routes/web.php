<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    $products = Product::all();
    return view('home',['products' => $products]);
   

});

Route::get('/products/{prod}', function (Product $prod) {   //route model binding
            //$product= Product::find($id);
    return view('product',['product' => $prod]);
});


Route::get('/get_product', function(){
    $products = Product::get();
    return $products;

});


Route::resource('order', App\Http\Controllers\OrderController::class);
Route::post('cart', [App\Http\Controllers\OrderItemController::class, 'store'])->name('add_to_cart')->middleware('auth');


Route::get('/home', [ProductsController::class, 'index']);
//Route::get('products/search', [ProductsController::class, 'search'])->name('products.search');
Route::resource('products', ProductsController::class)->only(['index', 'show']);
Route::get('search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');


Route::get('/categories/{category}', function(Category $category){
    //$products = Product::whereCategoryId($category->id)->get();
    $products = $category->products;
    $categories = category::all();
    return view('category', ['products' => $products, 'category' => $category, 'categories' => $categories]);

});


//Admin routing
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->name('dashboard');

// Route::get('products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('products_list');
// Route::get('products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('create_product');
// Route::post('products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store']);
// Route::get('products/edit/{product}', [App\Http\Controllers\Admin\ProductsController::class, 'edit']);
// Route::post('products/update/{product}', [App\Http\Controllers\Admin\ProductsController::class, 'update']);
Route::resource('categories', App\Http\Controllers\Admin\CategoriesController::class);
Route::resource('products', App\Http\Controllers\Admin\ProductsController::class);
});