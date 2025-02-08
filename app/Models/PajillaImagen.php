<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajillaImagen extends Model
{
    use HasFactory; 

    protected $table = 'pajilla_imagenes';
    protected $primaryKey = 'idimagen';

    protected $fillable = [
        'idproducto',
        'url_imagen'
    ];

    public $timestamps = false;
    public function pajilla(){
        return $this->belongsTo(Pajilla::class, 'idproducto', 'idproducto');
    }
}
