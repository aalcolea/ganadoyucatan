<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoS extends Model
{
    use HasFactory;
    protected $table = 'videoss';
    protected $fillable = ['nombre', 'ruta', 'tamaño', 'producto_id'];
    public function product() {
        return $this->belongsTo(Product::class, 'producto_id', 'id_producto');
    }
}
