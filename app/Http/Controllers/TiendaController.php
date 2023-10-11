<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductT;
use App\Models\ProductS;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\PGallery;
use App\Models\PTGallery;
use App\Models\PSubGallery;
use App\Models\MensajeProducto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Utilities\ImageConverter;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
class TiendaController extends Controller
{
    public function getEstados(){
        $estados = Estado::all();
        return response()->json($estados);
    }
    public function getCiudadesByEstado($estadoId){
        $ciudades = Ciudad::where('estado_id', $estadoId)->get();
        return response()->json($ciudades);
    }
    public function tiendaHome(){
        $products = Product::where('status', '1')->orderBy('idproducto', 'desc')->paginate(9);
        
        $data = ['products' => $products];
        return view('Tienda.home', $data);
    }
    public function tiendaProducto($id, $ruta){
        $product = Product::where('idproducto', $id)->where('ruta', $ruta)->get();
        $images = PGallery::where('productoid', $id)->get();
        //dd($product);
        $data = ['product' => $product, 'images' => $images];
        return view('Tienda.product', $data);
    }
    public function tiendaProductoMsg(Request $request, $id, $ruta){
            $nombre = ucwords(strtolower(trim($request->input('nombreContacto'))));
            $email = strtolower(trim($request->input('emailContacto')));
            $useragent = $request->server('HTTP_USER_AGENT');
            $ip = $request->server('REMOTE_ADDR');
            $dispositivo = "PC";
            $vendedorid = $request->input('vendedorid');
            if(preg_match("/mobile/i", $useragent)){
                $dispositivo = "Móvil"; 
            } else if (preg_match("/tablet/i", $useragent)) {
                $dispositivo = "Tablet";
            } else if (preg_match("/iPhone/i", $useragent)) {
                $dispositivo = "iPhone";
            } else if (preg_match("/iPad/i", $useragent)) {
                $dispositivo = "iPad";
            }
            $product = Product::where('idproducto', $id)->pluck('nombre')->first();
            $msg = new MensajeProducto;
            $msg->nombre = $nombre;
            $msg->mensaje = "Nuevo Mensaje para el producto $product";
            $msg->email = $email;
            $msg->ip = $ip;
            $msg->dispositivo = $dispositivo;
            $msg->useragent = $useragent;
            $msg->datecreated = date('Y-m-d');
            $msg->vendedorid = $vendedorid;
            $msg->status = 0;
            if($msg->save()){

                    Alert::success('Éxito', 'El mensaje se envió correctamente.');
                    return redirect('/tienda/producto/'.$id.'/'.$ruta);

            }
    }
    public function getTianguisTienda(){
        $products = ProductT::where('status', '2')->orderBy('idproducto', 'desc')->paginate(9);
        $data = ['products' => $products];
        return view('Tienda.Tianguis.tianguisHome', $data);
    }
    public function getTianguis(){
        return view('Tienda.tianguisPost');
    }
    public function tianguisProducto($id){
        $product = ProductT::where('idproducto', $id)->get();
        $product = $product[0];
        
        $images = PTGallery::where('id_producto', $id)->get();
        //dd($product);
        $data = ['product' => $product, 'images' => $images];
        return view('Tienda.Tianguis.tianguisProduct', $data);
    }
    public function getSubastas(){
        $today = now()->format('Y-m-d H:i:s');
        $products = ProductS::where('status', '1')->where('fechaCierre', '>', $today)->get();
        $data = ['products' => $products];

        return view('Tienda.Subasta.subastaHome', $data);
    }
    public function postTianguis(Request $request){
        $estado = $request->input('estados', 1);
        $ciudad = $request->input('ciudades', 1);
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $numero = $request->input('numero');
        $ruta = strtolower(str_replace(" ", "-", $nombre));
        $pesoG = $request->input('pesoG');
        $txtStock = $request->input('txtStock');
        $txtRaza = $request->input('txtRaza');
        $listVacu = $request->input('listVacu');
        $listArete = $request->input('listArete');
        $listCert = $request->input('listCert');
        $lisTipo = $request->input('lisTipo');
        $txtLink = $request->input('txtLink');
        $propietario = $request->input('propietario');
        $id_producto = DB::table('productot')->insertGetId([
            'estado' => $estado,
            'ciudad' => $ciudad,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'numero' => $numero,
            'ruta' => $ruta,
            'peso' => $pesoG,
            'stock' => $txtStock,
            'raza' => $txtRaza,
            'vacunado' => $listVacu,
            'arete' => $listArete,
            'certificado' => $listCert,
            'tipo' => $lisTipo,
            'link' => $txtLink,
            'propietario' => $propietario,
            'vendedorid' => '1',
        ]);
        $ruta_carpeta = "uploads/tianguis/$id_producto";
        if (!File::makeDirectory($ruta_carpeta, 0755, true)) {
            return "Error al crear la carpeta del producto $id_producto";
        }
        $includesImages = [];
        for ($i = 1; $i <= 9; $i++) {
            $imagen = "imagen" . $i;
            if ($request->hasFile($imagen) && $request->file($imagen)->isValid()) {
                $uploadPath = "tianguis/$id_producto";
                $ruta = "$ruta_carpeta/" . $request->file($imagen)->getClientOriginalName();
                $randomString = Str::random(3);
                $filename = 'GYT-'.date('md').'-'.$randomString . '.' . $request->file($imagen)->getClientOriginalExtension();
                $path = $filename;
                $ruta_webp = $uploadPath . '/' . pathinfo($path, PATHINFO_FILENAME) . '.webp';
                $destinationPath = Storage::disk('webp_images')->path($ruta_webp);
                $img = Image::make($request->file($imagen)->getRealPath())->resize(800, 600);
                $img->encode('webp', 10)->save($destinationPath);
                $includesImages[] = $ruta_webp;
            }
        }
        foreach ($includesImages as $ruta_webp) {
            DB::table('imagent')->insert([
                'id_producto' => $id_producto,
                'ruta' => $ruta_webp,
            ]);
        }
        if ($id_producto) {
            return "HOLA";
        } else {
            return "Error al agregar el producto";
        }
    }
    public function getSubasta($id){
        $p = ProductS::where('status', 1)->findOrFail($id);
        $images = PSubGallery::where('productoid', $id)->get();
        $data = ['p' => $p, 'images' => $images];
        return view('Tienda.Subasta.subastaProduct', $data);
    }
    public function sendOffer(Request $request, $id){
        return null;
    }
    
}