<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PTGallery;
class ProductT extends Model
{
    use HasFactory;
    protected $table = 'productoT';
    protected $primaryKey = 'idproducto';
    public function portada(){
        return $this->hasMany(PTGallery::class, 'id_producto', 'idproducto');
    }
    public function location(){
        return $this->hasOne(Estado::class, 'id', 'estado');
    }
}
