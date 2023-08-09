<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use App;
use App\Models\Product;
use App\Models\ProductT;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Comisaria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Utilities\ImageConverter;
class ProductsController extends Controller
{
        public function __construct(){
        $this->middleware('auth');
    }
    public function getEstados(){
        $estados = Estado::all();
        return response()->json($estados);
    }
    public function getCiudadesByEstado($estadoId){
        $ciudades = Ciudad::where('estado_id', $estadoId)->get();
        return response()->json($ciudades);
    }
    public function imageAction(Request $request){
        if (!$request->session()->has('product.images')) {
            $request->session()->put('product.images', []);
            $request->session()->put('product.imageCount', 0);
        }
        if(!$request->session()->has('product.randomString')){
            $request->session()->put('product.randomString', Str::random(4));
        }
        $randomString = $request->session()->get('product.randomString');
        $action = $request->input('action');
        switch ($action) {
            case 'add':
                $imageCount = $request->session()->get('product.imageCount');
                $uploadedImage = $request->file('uploaded_image');
                $dateFolder = date('Y-m-d');
                $uploadPath = 'uploads/' . $dateFolder;
                $filename = $imageCount . '-' . 'GY-'.date('md').'-'.$randomString . '.' . $uploadedImage->getClientOriginalExtension();
                $request->session()->increment('product.imageCount');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }
                $path = $filename;
                $webpPath = $dateFolder . '/' . pathinfo($path, PATHINFO_FILENAME) . '.webp';
                $destinationPath = Storage::disk('webp_images')->path($webpPath);
                $img = Image::make($uploadedImage->getRealPath())->resize(800, 600);
                $img->encode('webp', 10)->save($destinationPath);
                //ImageConverter::convertToWebp($uploadedImage->getRealPath(), $destinationPath);
    
                $images = $request->session()->get('product.images');
                $images[] = [
                    'path' => '/' . $webpPath //$dateFolder . '/' . $webpPath
                ];
                $request->session()->put('product.images', $images);
                return response()->json(['image' => ['path' => '/' . $webpPath]]); //$dateFolder . '/' . $webpPath
            case 'delete':
                $imagePath = $request->input('image_path');
                $images = $request->session()->get('product.images');
                $images = array_filter($images, function ($image) use ($imagePath) {
                    return $image['path'] != $imagePath;
                });
                $request->session()->put('product.images', $images);
                if (file_exists(public_path('uploads/' . $imagePath))) {
                    unlink(public_path('uploads/' . $imagePath));
                }
                //cualquier de los dos sirve
               /* $webpPath = 'uploads/' . $imagePath;
                if (File::exists($webpPath)) {
                    File::delete($webpPath);
                }*/
                return response()->json(['success' => true]);
            case 'update':
                $newOrder = $request->input('new_order');
                $images = $request->session()->get('product.images');
                $orderedImages = [];
                foreach ($newOrder as $imageId) {
                    $orderedImages[] = $images[array_search($imageId, array_column($images, 'id'))];
                }
                $request->session()->put('product.images', $orderedImages);
                return response()->json(['success' => true]);
            default:
                return response()->json(['error' => 'Accion invalida'], 400);
        }
    }
    public function imageActionSub(Request $request){
        if (!$request->session()->has('product.imagesSub')) {
            $request->session()->put('product.imagesSub', []);
            $request->session()->put('product.imageCountSub', 0);
        }
        if(!$request->session()->has('product.randomStringSub')){
            $request->session()->put('product.randomStringSub', Str::random(4));
        }
        $randomString = $request->session()->get('product.randomStringSub');
        $action = $request->input('action');
        switch ($action) {
            case 'add':
                $imageCount = $request->session()->get('product.imageCountSub');
                $uploadedImage = $request->file('uploaded_image');
                $dateFolder = date('Y-m-d');
                $uploadPath = 'uploads/subasta/' . $dateFolder;
                $filename = $imageCount . '-' . 'GYS-'.date('md').'-'.$randomString . '.' . $uploadedImage->getClientOriginalExtension();
                $request->session()->increment('product.imageCountSub');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }
                $path = $filename;
                $webpPath = $dateFolder . '/' . pathinfo($path, PATHINFO_FILENAME) . '.webp';
                $destinationPath = Storage::disk('webp_images_sub')->path($webpPath);
                $img = Image::make($uploadedImage->getRealPath())->resize(800, 600);
                $img->encode('webp', 10)->save($destinationPath);
                //ImageConverter::convertToWebp($uploadedImage->getRealPath(), $destinationPath);
    
                $images = $request->session()->get('product.imagesSub');
                $images[] = [
                    'path' => '/' . $webpPath //$dateFolder . '/' . $webpPath
                ];
                $request->session()->put('product.imagesSub', $images);
                return response()->json(['image' => ['path' => '/' . $webpPath]]); //$dateFolder . '/' . $webpPath
            case 'delete':
                $imagePath = $request->input('image_path');
                $images = $request->session()->get('product.imagesSub');
                $images = array_filter($images, function ($image) use ($imagePath) {
                    return $image['path'] != $imagePath;
                });
                $request->session()->put('product.imagesSub', $images);
                if (file_exists(public_path('uploads/subasta/' . $imagePath))) {
                    unlink(public_path('uploads/subasta/' . $imagePath));
                }
                //cualquier de los dos sirve
               /* $webpPath = 'uploads/' . $imagePath;
                if (File::exists($webpPath)) {
                    File::delete($webpPath);
                }*/
                return response()->json(['success' => true]);
            case 'update':
                $newOrder = $request->input('new_order');
                $images = $request->session()->get('product.imagesSub');
                $orderedImages = [];
                foreach ($newOrder as $imageId) {
                    $orderedImages[] = $images[array_search($imageId, array_column($images, 'id'))];
                }
                $request->session()->put('product.imagesSub', $orderedImages);
                return response()->json(['success' => true]);
            default:
                return response()->json(['error' => 'Accion invalida'], 400);
        }
    }
    public function getComisariasByCiudad($ciudadId){
        $comisarias = Comisaria::where('ciudad_id', $ciudadId)->get();
        return response()->json($comisarias);
    }    
    public function getProductsHome(){
        return view('Admin.Products.home');
    }
    public function getNewGen(){
        $id = Auth::id();
        $products = Product::where('vendedorid', $id)->orderBy('idproducto', 'desc')->paginate(25);
        $data = ['products' => $products];
        return view('Admin.Products.gen', $data);
    }   
    public function postNewGen(Request $request){
        $rules = [
            'txtNombre' => 'required',
            'txtPrecio' => 'required',
            'txtDescripcion' => 'required'
        ];
        $messages = [
            'txtNombre.required' => 'Nombre de producto obligatorio',
            'txtPrecio.required' => 'Precio obligatorio',
            'txtDescripcion.required' => 'Por favor agregue una descripcion'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:


            $imagesJson = $request->input('images');
            $images = json_decode($imagesJson, true);
            if (!$images || count($images) == 0) {
                return back()->withErrors(['message' => 'Por favor, cargue al menos una imagen.'])->withInput();
            }
            dd($images);
            $firstImage = $images[0];
            $dateFolder = date('Y-m-d');
            $product = new Product;
            $product->status = '1';
            $product->nombre = e($request->input('name'));
            $product->slug = Str::slug($request->input('slug'));
            $product->category_id = $request->input('category');
            $product->type_id = $request->input('type');
            $product->price = $request->input('price');
            $product->divs = $request->input('div');
            $product->in_discount = $request->input('indiscount');
            $product->urgente = false;
            $product->content = e($request->input('content'));
            $idv = Auth::id();
            if(Auth::user()->giroEmp == 1 && Auth::user()->giroEmp != "5"){
                $product->asesor_id = null;
            }else{
                $product->asesor_id = $request->input('asesor');
            }
            $product->asesor_id = $request->input('asesor');
            $product->vendedorid = $idv;
            $product->location = $request->input('estado');
            $product->sublocation = $request->input('ciudad');
            $product->sSublocation = $request->input('comisaria');
           
            $coords = [ 'latitud' => $request->input('latitude'),
                        'longitud' => $request->input('longitude')];           
            $coords = json_encode($coords);
            $latitud = $request->input('latitude');
            $longitud = $request->input('longitude');
            $product->location = $request->input('state');
            $product->sublocation = $request->input('city');
            $product->sSublocation = $request->input('neighborhood');
            $randomString = Str::random(3);
            $product->image = basename($firstImage['path']);
            $product->save();
            if (count($images) > 1) {
                for ($i = 1; $i < count($images); $i++) {
                $imageData = $images[$i];
                $image = new PGallery;
                $image->productid = $product->id;
                $image->img = rand(0, 999).basename($imageData['path']);
                $image->save();
                }
            }
            $request->session()->forget('product_images');
            if($product->save()):
                return redirect('/admin/product/'.$product->id.'/edit')->with('message', 'Inmueble agregado con exito al sistema')->with('typealert', 'success'); 
            endif;
        endif;
    }
    public function getNewCom(){
        $id = Auth::id();
        $products = ProductT::where('vendedorid', $id)->orderBy('idproducto', 'desc')->paginate(25);
        $data = ['products' => $products];
        return view('Admin.Products.com', $data);
    }
    public function getNewSub(){
        $id = Auth::id();
        $products = ProductT::where('vendedorid', $id)->orderBy('idproducto', 'desc')->paginate(25);
        $data = ['products' => $products];
        return view('Admin.Products.sub', $data);
    }
}
