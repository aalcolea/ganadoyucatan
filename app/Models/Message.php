<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = ['content', 'admin_id', 'conversation_id'];
    public function user(){
        return $this->belongsTo(Persona::class, 'user_id');
    }

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }
}
