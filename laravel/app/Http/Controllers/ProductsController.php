<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
    //latest ID but if there is no argument like below latest('id') for ordering according to latest id
    $products = Product::latest('id')->get();
    return view('home',['products' => $products]);
    }
}
