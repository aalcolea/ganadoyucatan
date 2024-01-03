<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;
use App\Events\MessageAdded;
use Auth;
class Chat extends Component
{
    public $messageText;
    public function render()
    {
        return view('livewire.chat', [
            'messages' => $this->conversation->messages()->latest()->get(),
        ]);
    }
    public function sendMessage(){
        $this->validate(['messageText' => 'required']);
        $user = auth()->user();
        Message::create([
            'conversation_id' => $this->conversation->id, 
            'user_id' => $user->idpersona,
            'content' => $this->messageText, 
        ]);
        $this->messageText = '';
        event(new MessageAdded($this->conversation->id));
        } 

    public function mount(Conversation $conversation) {
        $this->conversation = $conversation;
        $this->emit('MessageAdded');
    }

}
