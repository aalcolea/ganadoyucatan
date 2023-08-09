<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class TiendaController extends Controller
{
    public function tiendaHome(){
        $products = Product::where('status', '1')->orderBy('idproducto', 'desc')->paginate(9);
        
        $data = ['products' => $products];
        return view('Tienda.home', $data);
    }
}
