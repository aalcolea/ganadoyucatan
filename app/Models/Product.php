<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
use App\Models\Persona;
use App\Models\Visits;
class Product extends Model
{
    use HasFactory;
    protected $table = 'producto';
    public $timestamps = false;
    protected $primaryKey = 'idproducto';
    protected $createdAt = 'datecreated';
    public function location(){
        return $this->hasOne(Estado::class, 'id', 'estado');
    }
    public function owner(){
        return $this->hasOne(Persona::class, 'idpersona', 'vendedorid');
    }
    public function images(){
        return $this->hasMany(PGallery::class, 'productoid', 'idproducto');
    }
    public function visits(){
        return $this->hasMany(Visits::class, 'idproducto', 'idproducto')->where('type', 'gen')->whereMonth('fecha', now()->month);
    }
}
