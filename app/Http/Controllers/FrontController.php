<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::getListProduct();
        $popular = Product::getPopular();

        return view('index', [
            'products' => $products,
            'popular' => $popular
        ]);
    }
}
