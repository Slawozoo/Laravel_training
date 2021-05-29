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

Route::get('/', function () {
    $products = Product::all();
    return view('products',['products' => $products]);
   

});

Route::get('/products/{prod}', function (Product $prod) {   //route model binding
            //$product= Product::find($id);
    return view('product',['product' => $prod]);
});

Route::get('/create_product', function(){
    Product::create([
        'product_name' => 'Laptop',
        'product_desc' => 'This is Dell Laptop with much functionality',
        'price' => '150000'

    ]);

});

Route::get('/get_product', function(){
    $products = Product::get();
    return $products;

});

Route::get('/create_post', function(){
    Post::create([
        'post_name' => 'Update',
        'post_desc' => 'No stocks available'

    ]);

});

// Route::get('/get_post', function(){
//     $posts = Post::get();
//     //return $posts;
//     $post1=array(
//         'post_name' => 'Third Product',
//         'post_desc' => 'This is the top most wanted product by the customers. This is prodcut a we want to sell. This is a good product.This is the top most wanted product by the customers. This is prodcut a we want to sell. This is a good product.This is the top most wanted product by the customers. This is prodcut a we want to sell. This is a good product.
//         his product is wanted by mainly man. This is prodcut a we want to sell. This is a good product. This is the top most wanted product by the customers. This is prodcut a we want to sell. This is a good product.This is the top most wanted product by the customers. This is prodcut a we want to sell. This is a good product.'
//     );

//     $posts = array($post1);
//     return view('posts', ['posts' => $posts] );

//     //return view($posts);

// });

Route::get('/home', [ProductsController::class, 'index']);

Route::get('/categories/{category}', function(Category $category){
    //$products = Product::whereCategoryId($category->id)->get();
    $products = $category->products;
    $categories = category::all();
    return view('category', ['products' => $products, 'category' => $category, 'categories' => $categories]);

});


//Admin routing
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('products_list');
Route::get('/admin/products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('create_product');
Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store']);
Route::get('/admin/products/edit/{product}', [App\Http\Controllers\Admin\ProductsController::class, 'edit']);
Route::post('/admin/products/update/{product}', [App\Http\Controllers\Admin\ProductsController::class, 'update']);