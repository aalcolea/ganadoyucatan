<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajilla extends Model
{
    use HasFactory;
    protected $table = 'pajilla';
    protected $primaryKey = 'idproducto';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'rancho',
        'vendedorid',
        'raza',
        'certificado',
        'estatus',
        'link',
        'estado',
        'ciudad',
        'comisaria',
        'premium',
        'edad'
    ];

    public $timestamps = false;
    public function imagenes(){
        return $this->hasMany(PajillaImagen::class, 'idproducto', 'idproducto');
    }
    public function videos(){
        return $this->hasMany(PajillaVideo::class, 'idproducto', 'idproducto');
    }
}
