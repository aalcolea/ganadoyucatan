<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;
use Illuminate\Support\Facades\Broadcast;

class SupportConversationController extends Controller
{
    

public function store(Request $request, Conversation $conversation){
    $user = auth()->user();
    $conversation = Conversation::create([
        'user_id' => $user->idpersona,
        'admin_id' => '1',
    ]);

    Broadcast::channel('support.' . $conversation->id, function ($user) use ($conversation) {
        return $user->isAdmin() || $user->id === $conversation->user_id;
    });

    return response()->json([
        'conversation_id' => $conversation->id,
    ]);
}
}
