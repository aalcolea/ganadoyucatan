<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class APIProductsController extends Controller
{
    public function show(){
        $vendedorId = Auth::id();
        $products = Product::where('status', '1')->where('vendedorid', $vendedorId)->orderBy('idproducto', 'desc')->paginate(10);
        return response()->json(['products' => $products]);
    }
}
//imagen, titulo, raza, peso, precio, vistas, estatus