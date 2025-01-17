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
use App\Models\ProductS;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Comisaria;
use App\Models\PGallery;
use App\Models\PSubGallery;
use App\Models\PTGallery;
use App\Models\Subasta;
use App\Models\Video;
use App\Models\VideoS;
use App\Models\VideoT;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Utilities\ImageConverter;
use App\Models\MensajeProducto;
use Illuminate\Support\Facades\Date;

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

    public function getProductImages($id){
        $product = Product::with(['images' => function ($query){
            $query->with(['product' => function($query){
                $query->select('idproducto', 'carpeta');
            }]);
        }])->find($id);
        $images = $product->images->map(function($image){
            return ['id' => $image->id, 'productid' => $image->productoid, 'img' => $image->img, 'imagePath'=> $image->product->carpeta.'/'.$image->img];
        });
        return response()->json($images);
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
                $img = Image::make($uploadedImage->getRealPath()); //->resize(800, 600);
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
                $img = Image::make($uploadedImage->getRealPath()); //->resize(800, 600);
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
    public function imageActionCom(Request $request){
        if (!$request->session()->has('product.imagesCom')) {
            $request->session()->put('product.imagesCom', []);
            $request->session()->put('product.imageCountCom', 0);
        }
        if(!$request->session()->has('product.randomStringCom')){
            $request->session()->put('product.randomStringCom', Str::random(4));
        }
        $randomString = $request->session()->get('product.randomStringCom');
        $action = $request->input('action');
        switch ($action) {
            case 'add':
                $imageCount = $request->session()->get('product.imageCountCom');
                $uploadedImage = $request->file('uploaded_image');
                $dateFolder = date('Y-m-d');
                $uploadPath = 'uploads/tianguis/' . $dateFolder;
                $filename = $imageCount . '-' . 'GYC-'.date('md').'-'.$randomString . '.' . $uploadedImage->getClientOriginalExtension();
                $request->session()->increment('product.imageCountCom');
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true);
                }
                $path = $filename;
                $webpPath = $dateFolder . '/' . pathinfo($path, PATHINFO_FILENAME) . '.webp';
                $destinationPath = Storage::disk('webp_images_com')->path($webpPath);
                $img = Image::make($uploadedImage->getRealPath()); //->resize(800, 600);
                $img->encode('webp', 10)->save($destinationPath);
                //ImageConverter::convertToWebp($uploadedImage->getRealPath(), $destinationPath);

                $images = $request->session()->get('product.imagesCom');
                $images[] = [
                    'path' => '/' . $webpPath //$dateFolder . '/' . $webpPath
                ];
                $request->session()->put('product.imagesCom', $images);
                return response()->json(['image' => ['path' => '/' . $webpPath]]); //$dateFolder . '/' . $webpPath
            case 'delete':
                $imagePath = $request->input('image_path');
                $images = $request->session()->get('product.imagesCom');
                $images = array_filter($images, function ($image) use ($imagePath) {
                    return $image['path'] != $imagePath;
                });
                $request->session()->put('product.imagesCom', $images);
                if (file_exists(public_path('uploads/tianguis/' . $imagePath))) {
                    unlink(public_path('uploads/tianguis/' . $imagePath));
                }
                //cualquier de los dos sirve
               /* $webpPath = 'uploads/' . $imagePath;
                if (File::exists($webpPath)) {
                    File::delete($webpPath);
                }*/
                return response()->json(['success' => true]);
            case 'update':
                $newOrder = $request->input('new_order');
                $images = $request->session()->get('product.imagesCom');
                $orderedImages = [];
                foreach ($newOrder as $imageId) {
                    $orderedImages[] = $images[array_search($imageId, array_column($images, 'id'))];
                }
                $request->session()->put('product.imagesCom', $orderedImages);
                return response()->json(['success' => true]);
            default:
                return response()->json(['error' => 'Accion invalida'], 400);
        }
    }
    public function imageActionPart(Request $request){
        if (!$request->session()->has('product.imagesPart')) {
            $request->session()->put('product.imagesPart', []);
            $request->session()->put('product.imageCount', 0);
        }

        $randomString = $request->session()->get('product.randomString');
        $action = $request->input('action');
        switch ($action) {
            case 'add':
                $imageCount = $request->session()->get('product.imageCount');
                $uploadedImage = $request->file('uploaded_imagePart');
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
                $img = Image::make($uploadedImage->getRealPath()); //->resize(800, 600);
                $img->encode('webp', 10)->save($destinationPath);
                //ImageConverter::convertToWebp($uploadedImage->getRealPath(), $destinationPath);

                $images = $request->session()->get('product.imagesPart');
                $images[] = [
                    'path' => '/' . $webpPath //$dateFolder . '/' . $webpPath
                ];
                $request->session()->put('product.imagesPart', $images);
                return response()->json(['image' => ['path' => '/' . $webpPath]]); //$dateFolder . '/' . $webpPath
            default:
                return response()->json(['error' => 'Accion invalida'], 400);
        }
    }
    public function getComisariasByCiudad($ciudadId){
        $comisarias = Comisaria::where('ciudad_id', $ciudadId)->get();
        return response()->json($comisarias);
    }
    public function getAllGanado(){
        $subastas = ProductS::paginate(10);
        $products = Product::paginate(10);
        $data = ['products' => $products, 'subastas' => $subastas];
        return view('Admin.Products.ganado', $data);
    }
    public function getProductsHome(){
        $id = Auth::id();
        $productsGen  = Product::where('vendedorid', $id)->orderBy('idproducto', 'desc')->paginate(25);
        $productsSub  = ProductS::where('vendedorid', $id)->orderBy('id_producto', 'desc')->paginate(25);
        $productsTian = ProductT::where('status', '2')->where('vendedorid', $id)->orderBy('idproducto')->get();
        $data = ['productsGen' => $productsGen, 'productsSub' => $productsSub, 'productsTian' => $productsTian ];
        return view('Admin.Products.home', $data);
    }
    public function getTianguisAll(){
        $products = ProductT::where('status', '1')->orderBy('idproducto')->get();
        $aprob = ProductT::where('status', '2')->where('vendedorid', Auth::id())->orderBy('idproducto')->get();

        return view('Admin.Products.aprob', compact('products', 'aprob'));
    }
    public function getTianguisView($id){
        $product = ProductT::findOrfail($id);
        $images = PTGallery::where('id_producto', $id)->get();
        $data = ['product' => $product, 'images' => $images];
        return view('partials.tianguisProductInfo', $data);
    }
    public function aprobTianguisProduct($id){
        $product = ProductT::findOrFail($id);
        $product->status = '2';
        if($product->save()){
            return redirect('admin/products/TianguisAdmin')->with('message', 'Producto aprobado con éxito')->with('typealert', 'success');
        }else{
            return back()->with('message', 'Error al aprobar el producto')->with('typealert', 'warning');
        }
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
            $dateFolder = date('Y-m-d');
            $pathParts = explode('/', $images[0]['path']);
            $filename = end($pathParts);
            //$parts = explode('-', $filename);
            //$sku = $parts[count($parts) - 2];
            $portada = pathinfo($filename, PATHINFO_FILENAME);
            $nombre = e($request->input('txtNombre'));
            $descripcion = e($request->input('txtDescripcion'));
            $precio = e($request->input('txtPrecio'));
            $stock = $request->input('txtStock');
            $tipo = $request->input('txtTipo');
            $date = date('Y-m-d H:i:s');
            $ruta = Str::slug($request->input('txtNombre'));
            $status = $request->input('listStatus');
            $rancho = e($request->input('txtRancho'));
            $peso = e($request->input('txtCodigo'));
            $vendedorid = Auth::id();
            $raza  = $request->input('txtRaza');
            $vacunado = $request->input('listVacu');
            $arete = $request->input('listArete');
            $certificado = $request->input('listCert');
            $estatus = $request->input('listEstatus');
            $ytlin = e($request->input('txtLink'));
            $estado = $request->input('estados');
            $ciudad = $request->input('ciudades');
            $comisaria = $request->input('comisarias');
            $destacado = $request->input('destacado');
            $premium1 = $request->input('premium');
            $edad = e($request->input('txtEdad'));
            $premium = ['destacado' => $destacado,
            'premium' => $premium1];
            $premium = json_encode($premium);
            if($ciudad == ''){
                $ciudad = 1;
            }


            $product = new Product;


            $product->nombre = $nombre;
            $product->portada = $portada;
            $product->descripcion = $descripcion;
            $product->precio = $precio;
            $product->stock = $stock;
            $product->tipo = $tipo;
            $product->datecreated  = $date;
            $product->ruta = $ruta;
            $product->status = $status;
            $product->rancho = $rancho;
            $product->peso = $peso;
            $product->vendedorid = $vendedorid;
            $product->carpeta = date('Y-m-d');
            $product->raza = $raza;
            $product->vacunado = $vacunado;
            $product->arete = $arete;
            $product->certificado = $certificado;
            $product->estatus = $estatus;
            $product->link = $ytlin;
            $product->estado = $estado;
            $product->ciudad = $ciudad;
            $product->comisaria = $comisaria;
            $product->premium = $premium;
            $product->edad = $edad;
            $product->save();
            if ($request->hasFile('video')) {
                $videoFile = $request->file('video');
                $destinationPath = Storage::disk('videos')->path($videoFile);
                $videoPath = $videoFile->store('', 'videos');
                $productoid = Product::where('vendedorid', Auth::id())->orderby('datecreated', 'desc')->value('idproducto');
                $video = new Video();
                $video->nombre = $videoFile->getClientOriginalName();
                $video->ruta = $videoPath;
                $video->tamaño = $videoFile->getSize();
                $video->producto_id = $productoid;
                $video->save();
            }

            if(count($images) > 1) {
                 for ($i = 0; $i < count($images); $i++) {
                        $imageData = $images[$i];
                        $productoid = $product->idproducto;

                        $pathParts = explode('/', $images[$i]['path']);
                        $filename = end($pathParts);
                        $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);

                        $existingImage = PGallery::where('productoid', $productoid)->where('img', $filenameWithoutExtension)->first();
                        if (!$existingImage) {
                            $image = new PGallery;
                            $image->productoid = $productoid;
                            $image->img = $filenameWithoutExtension;
                            $image->save();
                            print("Imagen guardada: $filenameWithoutExtension");
                        } else {
                            print("Imagen duplicada ignorada: $filenameWithoutExtension");
                        }
                    }
            }
            $request->session()->forget('product_images');
            $request->session()->forget('product.imageCount');
            $request->session()->increment('product.imageCount');
            $request->session()->forget('product.randomString');
            if($product->save()):
                return redirect('/admin/products/addNewGen')->with('message', 'Producto agregado con exito al sistema')->with('typealert', 'success');
            endif;
        endif;
    }
    public function getProductEdit($id)
    {
        $productEdit = Product::with('images')->find($id);
        if (!$productEdit) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $images = $productEdit->images->map(function($image) {
            return [
                'path' => '/'.$image->product->carpeta.'/'.$image->img.'.webp',
                'url' => asset('uploads/' . $image->product->carpeta . '/' . $image->img . '.webp')
            ];
        });

        return view('Admin.Products.home', $productEdit, $images);

        // return response()->json([
        //     'product' => $product,
        //     'images' => $images
        // ]);
    }
    public function getProductEdit2($id)
    {
        $productEdit = Product::with('images')->find($id);
        if (!$productEdit) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $images = $productEdit->images->map(function($image) {
            return [
                'path' => '/'.$image->product->carpeta.'/'.$image->img.'.webp',
                'url' => asset('uploads/' . $image->product->carpeta . '/' . $image->img . '.webp')
            ];
        });

        // return view('Admin.Products.home', $productEdit, $images);

        return response()->json([
            'product' => $productEdit,
            'images' => $images
        ]);
    }
    public function deleteGenImage($id, $portada){
        $product = Product::findOrfail($id);
        $image = $product->portada;

        if($image == $portada){
            $images = $product->images('productoid', $id)->get();
            $image = $images->first(function ($image) use ($portada) {
                return $image->img == $portada;
            });
            if($image){
                if($image->delete()){
                    $image = $product->images('productoid', $id)->first();
                    if($image != null){
                        $product->portada = $image->img;
                        if($product->save()){

                        }else{
                            return back()->with('message', 'Error al actualizar la portada')->with('typealert', 'warning');
                        }

                    }else{
                        $product->carpeta = 'default';
                        $product->portada = 'default';
                        $product->save();
                    }
                }else{
                    echo "Error al eliminar imagen";
                }
            }
        }else{
            $images = $product->images('productoid', $id)->get();
            $image = $images->first(function ($image) use ($portada){
                return $image->img == $portada;
            });
            if($image){
                $image->delete();
            }
        }
    }
    public function deleteSubImage($id, $portada){
        $product = ProductS::findOrfail($id);
        $image = $product->portada;

        if($image == $portada){
            $images = $product->images('productoid', $id)->get();
            $image = $images->first(function ($image) use ($portada) {
                return $image->img == $portada;
            });
            if($image){
                if($image->delete()){
                    $image = $product->images('productoid', $id)->first();
                    if($image != null){
                        $product->portada = $image->img;
                        if($product->save()){

                        }else{
                            return back()->with('message', 'Error al actualizar la portada')->with('typealert', 'warning');
                        }

                    }else{
                        $product->carpeta = 'default';
                        $product->portada = 'default';
                        $product->save();
                    }
                }else{
                    echo "Error al eliminar imagen";
                }
            }
        }else{
            $images = $product->images('productoid', $id)->get();
            $image = $images->first(function ($image) use ($portada){
                return $image->img == $portada;
            });
            if($image){
                $image->delete();
            }
        }
    }
    public function deleteComImage($id, $portada){
        $image = PTGallery::where('id_producto', $id)->where('ruta', $portada);

        $image->delete();
    }

    public function getSubEdit($id){
        $product = ProductS::find($id);
        $fechaCierre = \Carbon\Carbon::parse($product->fechaCierre)->toDateString();
        $images = $product->images->map(function($image) {
            return [
                'path' => '/'.$image->product->carpeta.'/'.$image->img.'.webp',
                'url' => asset('uploads/subasta/' . $image->product->carpeta . '/' . $image->img . '.webp')
            ];
        });
        return view('partials.subInfo', compact('product', 'fechaCierre', 'images'));
    }
    public function getComEdit($id){
        $product = ProductT::findOrfail($id);
        $images = $product->portada->map(function($image) {
            return [
                'path' => '/'.$image->product->imagen.'/'.$image->ruta. '.webp',
                'url' => asset('uploads/tianguis/' . $image->product->imagen . '/' . $image->ruta. '.webp')
            ];
        });
        return view('partials.comInfo', compact('product', 'images'));
    }
    public function postProductEditGen(Request $request, $id){
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
        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        }else{
            $nombre = e($request->input('txtNombre'));
            $descripcion = e($request->input('txtDescripcion'));
            $precio = e($request->input('txtPrecio'));
            $stock = $request->input('txtStock');
            $tipo = $request->input('txtTipo');
            $status = $request->input('listStatus');
            $rancho = e($request->input('txtRancho'));
            $peso = e($request->input('txtCodigo'));
            $vendedorid = Auth::id();
            $raza  = $request->input('txtRaza');
            $vacunado = $request->input('listVacu');
            $arete = $request->input('listArete');
            $certificado = $request->input('listCert');
            $estatus = $request->input('listEstatus');
            $ytlin = e($request->input('txtLink'));
            /*$estado = $request->input('estados');
            $ciudad = $request->input('ciudades');
            $comisaria = $request->input('comisarias');*/
            $destacado = $request->input('destacado');
            $premium1 = $request->input('premium');
            $edad = e($request->input('txtEdad'));
            $premium = ['destacado' => $destacado,
            'premium' => $premium1];
            $premium = json_encode($premium);

            $product = Product::find($id);

            $product->nombre = $nombre;
            $product->descripcion = $descripcion;
            $product->precio = $precio;
            $product->stock = $stock;
            $product->tipo = $tipo;
            $product->status = $status;
            $product->rancho = $rancho;
            $product->peso = $peso;
            $product->vendedorid = $vendedorid;
            $product->raza = $raza;
            $product->vacunado = $vacunado;
            $product->arete = $arete;
            $product->certificado = $certificado;
            $product->estatus = $estatus;
            $product->link = $ytlin;/*
            $product->estado = $estado;
            $product->ciudad = $ciudad;
            $product->comisaria = $comisaria;*/
            $product->premium = $premium;
            $product->edad = $edad;

            if($product->save()){
                return redirect('/admin/products/addNewGen')->with('message', 'Producto agregado con exito al sistema')->with('typealert', 'success');
            }
        }

    }
    public function postComInfo(Request $request, $id){
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
        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        }else{
            $estado = $request->input('estados', 1);
            $ciudad = $request->input('ciudades', 1);
            $nombre = $request->input('txtNombre');
            $descripcion = $request->input('txtDescripcion');
            $precio = $request->input('txtPrecio');
            $numero = Auth::user()->email_user;
            $ruta = strtolower(str_replace(" ", "-", $nombre));
            $peso = $request->input('txtCodigo');
            $stock = $request->input('txtStock');
            $raza = $request->input('txtRaza');
            $vacunado = $request->input('listVacu');
            $arete = $request->input('listArete');
            $certificado = $request->input('listCert');
            $lisTipo = $request->input('txtTipo');
            $ytlin = $request->input('txtLink');
            $estatus = $request->input('listStatus');
            $rancho = $request->input('txtRancho');
            $propietario = Auth::user()->nombres;
            $tipo = $request->input('txtTipo');
            $edad = $request->input('txtEdad');

            $product = ProductT::find($id);

            $product->nombre = $nombre;
            $product->descripcion = $descripcion;
            $product->precio = $precio;
            $product->stock = $stock;
            $product->tipo = $tipo;
            $product->status = '2';
            $product->rancho = $rancho;
            $product->peso = $peso;
            $product->vendedorid = Auth::id();
            $product->raza = $raza;
            $product->vacunado = $vacunado;
            $product->arete = $arete;
            $product->certificado = $certificado;
            $product->estatus = $estatus;
            $product->link = $ytlin;/*
            $product->estado = $estado;
            $product->ciudad = $ciudad;
            $product->comisaria = $comisaria;*/
            //$product->premium = $premium;
            $product->edad = $edad;

            if($product->save()){
                return redirect('/admin/products/addNewCom')->with('message', 'Producto agregado con exito al sistema')->with('typealert', 'success');
            }
        }

    }
    public function postNewSub(Request $request){
        $rules = [
            'txtNombre' => 'required',
            'txtDescripcion' => 'required',
        ];
        $messages = [
            'txtNombre.required' => 'Nombre de producto obligatorio',
            'txtDescripcion.required' => 'Por favor agregue una descripcion'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        }
        else{
            $imagesJson = $request->input('images');
            $images = json_decode($imagesJson, true);
            if (!$images || count($images) == 0) {
                return back()->withErrors(['message' => 'Por favor, cargue al menos una imagen.'])->withInput();
            }
            $dateFolder = date('Y-m-d');
            $pathParts = explode('/', $images[0]['path']);
            $filename = end($pathParts);
            //$parts = explode('-', $filename);
            //$sku = $parts[count($parts) - 2];
            $portada = pathinfo($filename, PATHINFO_FILENAME);
            $nombre = e($request->input('txtNombre'));
            $descripcion = e($request->input('txtDescripcion'));
            //$precio = e($request->input('txtPrecio'));
            $stock = $request->input('txtStock');
            $tipo = $request->input('txtTipo');
            $date = date('Y-m-d H:i:s');
            $rancho = e($request->input('txtRancho'));
            $peso = e($request->input('txtCodigo'));
            $vendedorid = Auth::id();
            $vacunado = $request->input('listVacu');
            $arete = $request->input('listArete');
            $certificado = $request->input('listCert');
            $ytlin = e($request->input('txtLink'));
            $estado = $request->input('estados');
            $ciudad = $request->input('ciudades');
            $comisaria = $request->input('comisarias');
            $destacado = $request->input('destacado');
            $premium1 = $request->input('premium');
            $edad = e($request->input('txtEdad'));
            $premium = ['destacado' => $destacado,
            'premium' => $premium1];
            $premium = json_encode($premium);
            $min = e($request->input('min'));
            $max = e($request->input('max'));
            $finFecha = $request->input('fecha_fin');
            $finHora = $request->input('hora_fin');
            $fecha = $finFecha.' '.$finHora;
            //$estatus = $request->input('listEstatus');


            $product = new ProductS;
            $product->nombre = $nombre;
            $product->portada = $portada;
            $product->descripcion = $descripcion;
            //$product->precio = $precio;
            $product->cantidad = $stock;
            $product->tipo = $tipo;
            $product->rancho = $rancho;
            $product->peso = $peso;
            $product->vendedorid = $vendedorid;
            $product->carpeta = date('Y-m-d');
            $product->vacunado = $vacunado;
            $product->arete = $arete;
            $product->certificado = $certificado;
            $product->yt = $ytlin;
            $product->estado = $estado;
            $product->ciudad = $ciudad;
            $product->municipio = $comisaria;
            /*$product->premium = $premium;*/
            $product->edad = $edad;
            $product->precioMin = $min;
            $product->precioMax = $max;
            $product->fechaCierre = $fecha;
            $product->fechaCreado = date('Y-m-d H:i:s');
            $product->status = '1';
            //$product->estatus = $estatus;
            $product->save();
            if(count($images) > 1) {
                for ($i = 0; $i < count($images); $i++) {
                    $imageData = $images[$i];
                    $image = new PSubGallery;
                    $productoid = ProductS::where('vendedorid', Auth::id())->orderby('fechaCreado', 'desc')->value('id_producto');
                    $image->productoid = $productoid;
                    $pathParts = explode('/', $images[$i]['path']);
                    $filename = end($pathParts);
                    $image->img = pathinfo($filename, PATHINFO_FILENAME);
                    $image->save();
                }
            }
            if ($request->hasFile('video')) {
                $videoFile = $request->file('video');
                $destinationPath = Storage::disk('videoss')->path($videoFile);
                $videoPath = $videoFile->store('', 'videoss');
                $productoid = ProductS::where('vendedorid', Auth::id())->orderby('fechaCreado', 'desc')->value('id_producto');
                $video = new VideoS();
                $video->nombre = $videoFile->getClientOriginalName();
                $video->ruta = $videoPath;
                $video->tamaño = $videoFile->getSize();
                $video->producto_id = $productoid;
                $video->save();
            }
            $request->session()->forget('product_images');


            $sub = new Subasta;
            $sub->min = $min;
            $sub->max = $max;
            $sub->tiempo_ini = date('Y-m-d H:i:s');
            $sub->tiempo_fin = $fecha;
            $sub->estado = '1';
            $sub->subastador = Auth::id();
            $sub->id_producto = ProductS::where('vendedorid', Auth::id())->orderby('fechaCreado', 'desc')->value('id_producto');
            $sub->save();
            if($product->save()){
                return redirect('/admin/products/addNewSub');
            }else{
                return redirect('/admin/products/addNewSub')->with('message', 'Error en el proceso')->with('typealert', 'danger');
            }

        }
    }
    public function postsubtInfo(Request $request, $id){
        $rules = [
            'txtNombre' => 'required',
            'txtDescripcion' => 'required'
        ];
        $messages = [
            'txtNombre.required' => 'Nombre de producto obligatorio',
            'txtDescripcion.required' => 'Por favor agregue una descripcion'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        }else{

            $nombre = e($request->input('txtNombre'));
            $descripcion = e($request->input('txtDescripcion'));
            $stock = $request->input('txtStock');
            $tipo = $request->input('txtTipo');
            $date = date('Y-m-d H:i:s');
            $rancho = e($request->input('txtRancho'));
            $peso = e($request->input('txtCodigo'));
            $vacunado = $request->input('listVacu');
            $arete = $request->input('listArete');
            $certificado = $request->input('listCert');
            $ytlin = e($request->input('txtLink'));
            $estado = $request->input('estados');
            $ciudad = $request->input('ciudades');
            $comisaria = $request->input('comisarias');
            $destacado = $request->input('destacado');
            $premium1 = $request->input('premium');
            $edad = e($request->input('txtEdad'));
            $premium = ['destacado' => $destacado,
            'premium' => $premium1];
            $premium = json_encode($premium);
            $min = e($request->input('min'));
            $max = e($request->input('max'));
            $finFecha = $request->input('fecha_fin');
            $finHora = $request->input('hora_fin');
            $fecha = $finFecha.' '.$finHora;
            $estatus = $request->input('listEstatus');
            $status = $request->input('listStatus');

            $product = ProductS::find($id);
            $product->nombre = $nombre;
            $product->descripcion = $descripcion;
            $product->cantidad = $stock;
            $product->tipo = $tipo;
            $product->rancho = $rancho;
            $product->peso = $peso;
            $product->vacunado = $vacunado;
            $product->arete = $arete;
            $product->certificado = $certificado;
            $product->yt = $ytlin;
            $product->estado = $estado;

            $product->edad = $edad;
            $product->precioMin = $min;
            $product->precioMax = $max;
            $product->fechaCierre = $fecha;
            $product->fechaCreado = date('Y-m-d H:i:s');
            $product->estatus = $estatus;
            $product->status = $status;
            $product->save();

            if($product->save()){
                return redirect('/admin/products/addNewSub')->with('message', 'Producto editado con exito en el sistema')->with('typealert', 'success');
            }
        }

    }
    public function postNewCom(Request $request){
        $imagesJson = $request->input('images');
        $images = json_decode($imagesJson, true);
        if (!$images || count($images) == 0) {
            return back()->withErrors(['message' => 'Por favor, cargue al menos una imagen.'])->withInput();
        }
        $dateFolder = date('Y-m-d');
        $pathParts = explode('/', $images[0]['path']);
        $filename = end($pathParts);
        $estado = $request->input('estados', 1);
        $ciudad = $request->input('ciudades', 1);
        $nombre = $request->input('txtNombre');
        $descripcion = $request->input('txtDescripcion');
        $precio = $request->input('precio');
        $numero = Auth::user()->email_user;
        $ruta = strtolower(str_replace(" ", "-", $nombre));
        $pesoG = $request->input('pesoG');
        $txtStock = $request->input('txtStock');
        $txtRaza = $request->input('txtRaza');
        $listVacu = $request->input('listVacu');
        $listArete = $request->input('listArete');
        $listCert = $request->input('listCert');
        $lisTipo = $request->input('txtTipo');
        $txtLink = $request->input('txtLink');
        $estatus = $request->input('listEstatus');
        $rancho = $request->input('txtRancho');
        $propietario = Auth::user()->nombres;
        $tipo = $request->input('txtTipo');
        $id_producto = DB::table('productot')->insertGetId([
            'nombre' => $nombre,
            'estado' => $estado,
            'ciudad' => $ciudad,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'numero' => $numero,
            'ruta' => $ruta,
            'peso' => $pesoG,
            'stock' => $txtStock,
            'rancho'=> $rancho,
            'raza' => $txtRaza,
            'estatus' => $estatus,
            'vacunado' => $listVacu,
            'arete' => $listArete,
            'certificado' => $listCert,
            'tipo' => $lisTipo,
            'link' => $txtLink,
            'propietario' => $propietario,
            'vendedorid' => Auth::id(),
            'imagen' =>  date('Y-m-d'),
            'status' => '2',
        ]);
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $destinationPath = Storage::disk('videost')->path($videoFile);
            $videoPath = $videoFile->store('', 'videost');
            $productoid = ProductT::where('vendedorid', Auth::id())->orderby('datecreated', 'desc')->value('idproducto');
            $video = new VideoT();
            $video->nombre = $videoFile->getClientOriginalName();
            $video->ruta = $videoPath;
            $video->tamaño = $videoFile->getSize();
            $video->producto_id = $productoid;
            $video->save();
        }
        if(count($images) >= 1) {
            for ($i = 0; $i < count($images); $i++) {
                $imageData = $images[$i];
                $image = new PTGallery;
                $productoid = ProductT::where('vendedorid', Auth::id())->orderby('datecreated', 'desc')->value('idproducto');
                $image->id_producto = $productoid;
                $pathParts = explode('/', $images[$i]['path']);
                $filename = end($pathParts);
                $image->ruta = pathinfo($filename, PATHINFO_FILENAME);
                $image->save();
            }
        }
        $request->session()->forget('product.imagesCom');
        $request->session()->forget('product.imageCountCom');
        $request->session()->increment('product.imageCountCom');
        $request->session()->forget('product.randomStringCom');
        if ($id_producto) {
            return redirect('/admin/products/addNewCom')->with('message', 'Producto agregado con exito al sistema')->with('typealert', 'success');
        } else {
            return back('/admin/products/addNewCom')->with('message', 'Error al agregar el producto a  l sistema')->with('typealert', 'warning');
        }
    }
    public function deleteSub($id){
        $product = ProductS::findOrfail($id);
        if($product->delete()){
            return back()->with('message', 'Producto eliminado con exito al sistema')->with('typealert', 'success');
        }else{
            return back('/admin/products/addNewSub')->with('message', 'Error al eliminar el producto eliminado del sistema')->with('typealert', 'warning');
        }

    }
    public function deletecom($id){
        $product = ProductT::findOrfail($id);
        if($product->delete()){
            return redirect('/admin/products/addNewCom')->with('message', 'Producto eliminado con exito al sistema')->with('typealert', 'success');
        }else{
            return back('/admin/products/addNewCom')->with('message', 'Error al eliminar el producto eliminado del sistema')->with('typealert', 'warning');
        }
    }
    public function deleteGen($id){
        $product = Product::findOrfail($id);
        if($product->delete()){
            return back()->with('message', 'Producto eliminado con exito al sistema')->with('typealert', 'success');
        }else{
            return back()->with('message', 'Error al eliminar el producto eliminado del sistema')->with('typealert', 'warning');
        }

    }
    public function getNewCom(){
        $id = Auth::id();
        $products = ProductT::where('vendedorid', $id)->orderBy('idproducto', 'desc')->paginate(25);
        $data = ['products' => $products];
        return view('Admin.Products.com', $data);
    }
    public function getNewSub(){
        $id = Auth::id();
        $products = ProductS::where('vendedorid', $id)->orderBy('id_producto', 'desc')->paginate(25);
        $data = ['products' => $products];
        return view('Admin.Products.sub', $data);
    }
    public function getMensajesHome(){
        $id = Auth::id();
        $msg = MensajeProducto::where('vendedorid', $id)->where('status', '0')->get();
        $data = ['msg' => $msg];
        return view('Admin.mensajesHome', $data);
    }
    public function readMensajesHome($id){
        $msg = MensajeProducto::find($id);

        if ($msg) {
            if ($msg->status == '0') {
                $msg->status = '1';
                $msg->save();

                return back()->with('message', 'Mensaje marcado como leído')->with('typealert', 'success');
            } else {
                return back()->with('message', 'El mensaje ya ha sido leído')->with('typealert', 'info');
            }
        } else {
            return back()->with('message', 'Mensaje no encontrado')->with('typealert', 'error');
        }
    }
    public function markMultipleAsRead(Request $request){
        $messageIds = $request->input('message_ids');

        if (!is_array($messageIds) || count($messageIds) == 0) {
            return back()->with('message', 'No se seleccionaron mensajes')->with('typealert', 'error');
        }

        $updatedMessages = MensajeProducto::whereIn('id', $messageIds)
                                          ->where('status', '0')
                                          ->update(['status' => '1']);

        return back()->with('message', 'Mensajes marcados como leídos')->with('typealert', 'success');
    }

      /**/
    public function addImages(Request $request) {
        $productId = $request->input('product_id');
        //$dateFolder = $request->input('dataPath');
        $product = Product::find($productId);
        $dateFolder = $product->carpeta;
        $name = substr($product->portada, 1, 13);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $uploadedImages = $request->file('uploaded_images');
        $countUploadedImages = count($uploadedImages);
        $images = [];
        foreach ($uploadedImages as $uploadedImage) {
            //$dateFolder = date('Y-m-d');
            //$dateFolder = $request->input('dataPath');
            $uploadPath = 'uploads/' . $dateFolder;
            $filename = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            $newIndex =  rand(500, 1000);
            for ($i = $newIndex; $i < $newIndex + $countUploadedImages; $i++) {
                $path = $i . $name;

            }
            //$path = $filename;
            $webpPath = $dateFolder . '/' . pathinfo($path, PATHINFO_FILENAME) . '.webp';
            $destinationPath = Storage::disk('webp_images')->path($webpPath);

            $img = Image::make($uploadedImage->getRealPath()); //->resize(800, 600);
            $img->encode('webp', 10)->save($destinationPath);
            $image = new PGallery;
            $image->productoid = $productId;
            $image->img = $path;
            $image->save();
            $images[] = [
                'path' => '/' . $webpPath,
            ];
        }

        /*$product->images()->createMany($images);*/

        return response()->json(['image' => ['path' => '/' . $webpPath]]);
    }
    public function addImagesSub(Request $request) {
        $productId = $request->input('product_id');
        //$dateFolder = $request->input('dataPath');
        $product = ProductS::find($productId);
        $dateFolder = $product->carpeta;
        $name = substr($product->portada, 1, 14);
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $uploadedImages = $request->file('uploaded_images');
        $countUploadedImages = count($uploadedImages);
        $images = [];
        foreach ($uploadedImages as $uploadedImage) {
            //$dateFolder = date('Y-m-d');
            //$dateFolder = $request->input('dataPath');
            $uploadPath = 'uploads/' . $dateFolder;
            $filename = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            $newIndex =  rand(500, 1000);
            for ($i = $newIndex; $i < $newIndex + $countUploadedImages; $i++) {
                $path = $i . $name;

            }
            //$path = $filename;
            $webpPath = $dateFolder . '/' . pathinfo($path, PATHINFO_FILENAME) . '.webp';
            $destinationPath = Storage::disk('webp_images_sub')->path($webpPath);

            $img = Image::make($uploadedImage->getRealPath()); //->resize(800, 600);
            $img->encode('webp', 10)->save($destinationPath);
            $image = new PSubGallery;
            $image->productoid = $productId;
            $image->img = $path;
            $image->save();
            $images[] = [
                'path' => '/' . $webpPath,
            ];
        }

        /*$product->images()->createMany($images);*/

        return response()->json(['image' => ['path' => '/' . $webpPath]]);
    }
    public function addImagesCom(Request $request) {
        $productId = $request->input('product_id');
        $product = ProductT::find($productId);
        $dateFolder = $product->imagen;
        $random = strtolower(Str::random(4));
        $name = '-GYC-'.date('md').'-'.$random;
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
        $uploadedImages = $request->file('uploaded_images');
        $countUploadedImages = count($uploadedImages);
        $images = [];
        foreach ($uploadedImages as $uploadedImage) {
            $uploadPath = 'uploads/' . $dateFolder;
            $filename = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            $newIndex =  rand(500, 1000);
            for ($i = $newIndex; $i < $newIndex + $countUploadedImages; $i++) {
                $path = $i . $name;

            }
            $webpPath = $dateFolder . '/' . pathinfo($path, PATHINFO_FILENAME) . '.webp';
            $destinationPath = Storage::disk('webp_images_com')->path($webpPath);

            $img = Image::make($uploadedImage->getRealPath()); //->resize(800, 600);
            $img->encode('webp', 10)->save($destinationPath);
            $image = new PTGallery;
            $image->id_producto = $productId;
            $image->ruta = $path;
            $image->save();
            $images[] = [
                'path' => '/' . $webpPath,
            ];
        }
        return response()->json(['image' => ['path' => '/' . $webpPath]]);
    }
}
