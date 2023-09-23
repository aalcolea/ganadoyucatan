<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $table = 'conversations';
    protected $fillable = ['user_id', 'admin_id', 'closed'];

    public function messages(){
        return $this->hasMany(Message::class, 'conversation_id');
    }

    public function user(){
        return $this->belongsTo(Persona::class, 'user_id');
    }

    public function admin(){
         return $this->belongsTo(Persona::class, 'admin_id');
    }
}
