<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportConversation;
class SupportConversationController extends Controller
{
    

public function store(Request $request, SupportConversation $conversation){
    $user = auth()->user();
    $conversation = SupportConversation::create([
        'user_id' => $user->id,
        'admin_id' => null,
    ]);

    return response()->json([
        'conversation_id' => $conversation->id,
    ]);
    Broadcast::channel('support.' . $conversation->id, function ($user) use ($conversation) {
        return $user->isAdmin() || $user->id === $conversation->user_id;
    });

    return response()->json([
        'conversation_id' => $conversation->id,
    ]);
}
