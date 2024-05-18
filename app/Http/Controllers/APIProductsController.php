<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductT;
use App\Models\ProductS;
use Auth;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Comisaria;
use Validator;
use App\Models\PGallery;
use App\Models\PTGallery;
use App\Models\PSubGallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Utilities\ImageConverter;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Video;

class APIProductsController extends Controller
{
    public function show(){
        $vendedorId = Auth::id();
        $products = Product::where('status', '1')->where('vendedorid', $vendedorId)->orderBy('idproducto', 'desc')->paginate(10);
        return response()->json(['products' => $products]);
    }    
    public function showCom(){
        $vendedorId = Auth::id();
        $products = ProductT::where('status', '2')->where('vendedorid', $vendedorId)->orderBy('idproducto', 'desc')->paginate(10);
        return response()->json(['products' => $products]);
    }    
    public function showSub(){
        $vendedorId = Auth::id();
        $products = ProductS::where('status', '1')->where('vendedorid', $vendedorId)->orderBy('id_producto', 'desc')->paginate(10);
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
    public function getProductGen(Request $request){
        $producto = Auth::id();
        $product;
        return "in process";
    }
    public function postNewGen(Request $request){
        $data = $request->all();
        $rules = [
            'nombre' => 'required',
            'rancho' => 'required',
            'descripcion' => 'required',
        ];
        $messages = [
            'nombre.required' => 'El nombre del producto es obligatorio',
            'rancho.required' => 'El rancho es obligatorio',
            'descripcion.required' => 'La descripción es obligatoria',
        ];
        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = new Product;
        $product->nombre = $data['nombre'];
        $product->descripcion = $data['descripcion'];
        $product->rancho = $data['rancho'];
        $product->raza = $data['raza'];
        $product->ruta = "test";
        $product->precio = $data['precio'];
        $product->stock = $data['stock'];
        $product->portada = "";
        $product->carpeta = "";
        $product->save(); 

        if ($request->hasFile('images')) {
                $images = $request->file('images');
                $dateFolder = date('Y-m-d');
                $uploadPath = 'uploads/' . $dateFolder;
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }
                foreach ($images as $index => $image) {
                    $filename = $image->getClientOriginalName();
                    $webpPath = $dateFolder . '/' . pathinfo($filename, PATHINFO_FILENAME) . '.webp';
                    $destinationPath = Storage::disk('webp_images')->path($webpPath);

                    try {
                        $img = Image::make($image->getRealPath());
                        $img->encode('webp', 10)->save($destinationPath);
                    } catch (Exception $e) {
                        return response()->json(['error' => 'No se pudo guardar la imagen: ' . $e->getMessage()], 500);
                    }

                    if ($index === 0) {
                        $product->portada = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
                        $product->carpeta = $dateFolder;
                        $product->save();
                    }

                    $imageEntry = new PGallery;
                    $productoid = Product::orderBy('datecreated', 'desc')->value('idproducto');
                    $imageEntry->productoid = $productoid;
                    $imageEntry->img = $filename;
                    $imageEntry->save();
                }
            }

        if ($request->hasFile('videos')) {
            $videos = $request->file('videos');

            foreach ($videos as $videoFile) {
                $destinationPath = Storage::disk('videos')->path($videoFile);
                $videoPath = $videoFile->store('', 'videos');
                $productoid = Product::orderBy('datecreated', 'desc')->value('idproducto');

                $video = new Video();
                $video->nombre = $videoFile->getClientOriginalName();
                $video->ruta = $videoPath;
                $video->tamaño = $videoFile->getSize();
                $video->producto_id = $productoid;
                $video->save();
            }
        }   

        return response()->json(['message' => 'Producto agregado con éxito'], 200);
    }
    public function postNewCom(Request $request){
        $data = $request->all();
        $rules = [
            'nombre' => 'required',
            'rancho' => 'required',
            'descripcion' => 'required',
        ];
        $messages = [
            'nombre.required' => 'El nombre del producto es obligatorio',
            'rancho.required' => 'El rancho es obligatorio',
            'descripcion.required' => 'La descripción es obligatoria',
        ];
        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $numero = Auth::user()->email_user;
        $nombres = Auth::user()->nombres;
        $nombre = $data['nombre'];
        $ruta = strtolower(str_replace(" ", "-", $nombre));
        $product = new ProductT;
        $product->nombre = $nombre;
        $product->descripcion = $data['descripcion'];
        $product->rancho = $data['rancho'];
        $product->raza = $data['raza'];
        $product->ruta = $ruta;
        $product->precio = $data['precio'];
        $product->stock = $data['stock'];
        $product->vacunado = $data['vacu'];
        $product->tipo = $data['tipo'];
        $product->peso = $data['peso'];
        $product->vendedorid = Auth::id();
        $product->propietario = $nombres;
        $product->imagen = "";
        $product->numero = $numero;
        $product->save(); 

        if ($request->hasFile('images')) {
                $images = $request->file('images');
                $dateFolder = date('Y-m-d');
                $uploadPath = 'uploads/tianguis/' . $dateFolder;
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }
                foreach ($images as $index => $image) {
                    $filename = $image->getClientOriginalName();
                    $webpPath = $dateFolder . '/' . pathinfo($filename, PATHINFO_FILENAME) . '.webp';
                    $destinationPath = Storage::disk('webp_images_com')->path($webpPath);

                    try {
                        $img = Image::make($image->getRealPath());
                        $img->encode('webp', 10)->save($destinationPath);
                    } catch (Exception $e) {
                        return response()->json(['error' => 'No se pudo guardar la imagen: ' . $e->getMessage()], 500);
                    }

                    if ($index === 0) {
                        //$product->portada = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
                        $product->imagen = $dateFolder;
                        $product->save();
                    }

                    $imageEntry = new PTGallery;
                    $productoid = ProductT::orderBy('datecreated', 'desc')->value('idproducto');
                    $imageEntry->id_producto = $productoid;
                    $imageEntry->ruta = $filename;
                    $imageEntry->save();
                }
            }

        if ($request->hasFile('videos')) {
            $videos = $request->file('videos');

            foreach ($videos as $videoFile) {
                $destinationPath = Storage::disk('videost')->path($videoFile);
                $videoPath = $videoFile->store('', 'videost');
                $productoid = ProductT::orderBy('datecreated', 'desc')->value('idproducto');

                $video = new Video();
                $video->nombre = $videoFile->getClientOriginalName();
                $video->ruta = $videoPath;
                $video->tamaño = $videoFile->getSize();
                $video->producto_id = $productoid;
                $video->save();
            }
        }   

        return response()->json(['message' => 'Producto agregado con éxito'], 200);
    }

}
//imagen, titulo, raza, peso, precio, vistas, estatus