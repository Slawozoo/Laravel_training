<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(){
        //return request('search');
          //return request(['search', 'category']);
          $products = Product::latest()->search(request(['search', 'category']))->get();
          return view('products', ['products' => $products]);
    }
}
