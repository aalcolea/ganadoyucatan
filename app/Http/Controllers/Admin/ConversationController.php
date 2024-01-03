<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Persona;
use App\Http\Livewire\Chat;
use Auth;
class ConversationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $conversations = Conversation::where('user_id', auth()->id())->get();
        return view('Admin.Conversations.index', compact('conversations'));
    }
    /*public function show(Conversation $conversation){
        return view('Admin.Conversations.show', compact('conversation'));
    }*/
    public function show(Conversation $conversation){
        return view('Admin.Conversations.show', compact('conversation'))
            ->with('livewire', app(Chat::class, ['conversation' => $conversation]));
    }
    public function startChat(){
        $admin = Persona::where('rolid', '1')->first();
        $user = auth()->user();
        $conversation = Conversation::create([
            'user_id' => $user->idpersona,
            'admin_id' => $admin->idpersona
        ]);
        $messages = $conversation->messages; 
        return view('Admin.Conversations.show', compact('conversation', 'messages'));
    }
}
