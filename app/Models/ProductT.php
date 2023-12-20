<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PTGallery;
use App\Models\Visits;
use App\Models\Ciudad;
class ProductT extends Model
{
    use HasFactory;
    protected $table = 'productot';
    protected $primaryKey = 'idproducto';
    public $timestamps = false;
    public function portada(){
        return $this->hasMany(PTGallery::class, 'id_producto', 'idproducto');
    }
    public function location(){
        return $this->hasOne(Estado::class, 'id', 'estado');
    }
    public function ciudades(){
        return $this->hasOne(Ciudad::class, 'id', 'ciudad');
    }
    public function owner(){
        return $this->hasOne(Persona::class, 'idpersona', 'vendedorid');
    }
    public function visits(){
        return $this->hasMany(Visits::class, 'idproducto', 'idproducto')->where('type', 'com')->whereMonth('fecha', now()->month);
    }
    public function images(){
        return $this->hasMany(PSubGallery::class, 'productoid', 'idproducto');
    }
}
