<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
class Product extends Model
{
    use HasFactory;
    protected $table = 'producto';

    public function location(){
        return $this->hasOne(Estado::class, 'id', 'estado');
    }
}
