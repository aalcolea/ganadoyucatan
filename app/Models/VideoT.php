<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoT extends Model
{
    use HasFactory;
    protected $table = 'videost';
    protected $primaryKey = 'producto_id';
    protected $fillable = ['nombre', 'ruta', 'tamaño', 'producto_id'];
    public function product() {
        return $this->belongsTo(ProductT::class, 'producto_id', 'idproducto');
    }
}
