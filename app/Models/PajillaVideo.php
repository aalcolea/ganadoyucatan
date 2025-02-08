<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajillaVideo extends Model
{
    use HasFactory;
    protected $table = 'pajilla_videos';
    protected $primaryKey = 'idvideo';

    protected $fillable = [
        'idproducto',
        'url_video',
        'nombre_video',
        'tamaño'
    ];
    public $timestamps = false;
    public function pajilla(){
        return $this->belongsTo(Pajilla::class, 'idproducto', 'idproducto');
    }
}
