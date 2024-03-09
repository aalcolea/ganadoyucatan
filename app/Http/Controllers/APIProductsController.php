<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class APIProductsController extends Controller
{
    public function show(){
        $products = Product::where('status', '1')->orderBy('idproducto', 'desc')->paginate(10);
        return response()->json(['products' => $products]);
    }
}
//imagen, titulo, raza, peso, precio, vistas, estatus