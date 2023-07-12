<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ApiController extends Controller
{
    public function getProducts(){
        $products = Product::where('status', '1')->get();
        return response()->json($products);
    }
}
