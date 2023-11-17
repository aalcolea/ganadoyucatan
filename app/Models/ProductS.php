<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visits;
class ProductS extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;
    public function location(){
        return $this->hasOne(Estado::class, 'id', 'estado');
    }
    public function visits(){
        return $this->hasMany(Visits::class, 'idproducto', 'id_producto')->where('type', 'sub')->whereMonth('fecha', now()->month);
    }
    public function ciudad(){
        return $this->hasOne(Ciudad::class, 'id', 'ciudad');
    }
    public function owner(){
        return $this->hasOne(Persona::class, 'idpersona', 'vendedorid');
    }
    
}
