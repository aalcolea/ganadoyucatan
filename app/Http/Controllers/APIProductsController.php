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
    public function getEstados() {
        $estados = Estado::all();
        return response()->json($estados);
    }

    public function getCiudadesByEstado($estadoId) {
        $ciudades = Ciudad::where('estado_id', $estadoId)->get();
        return response()->json($ciudades);
    }

    public function getComisariasByCiudad($ciudadId) {
        $comisarias = Comisaria::where('ciudad_id', $ciudadId)->get();
        return response()->json($comisarias);
    }
}
//imagen, titulo, raza, peso, precio, vistas, estatus