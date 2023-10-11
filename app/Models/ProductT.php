<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PTGallery;
use App\Models\Ciudad;
class ProductT extends Model
{
    use HasFactory;
    protected $table = 'productoT';
    protected $primaryKey = 'idproducto';
    public $timestamps = false;
    public function portada(){
        return $this->hasMany(PTGallery::class, 'id_producto', 'idproducto');
    }
    public function location(){
        return $this->hasOne(Estado::class, 'id', 'estado');
    }
    public function ciudad(){
        return $this->hasOne(Ciudad::class, 'id', 'ciudad');
    }
}
