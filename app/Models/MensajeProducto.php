<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeProducto extends Model
{
    use HasFactory;
    protected $table = 'mensaje';
    public $timestamps = false;
    protected $createdAt = 'datecreated';
    public function producto(){
        return $this->hasOne(Producto::class, 'idproducto', );
    }
}

