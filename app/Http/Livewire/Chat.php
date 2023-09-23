<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;
use App\Events\MessageAdded;

class Chat extends Component
{
    public function render()
    {
        return view('livewire.chat', [
            'messages' => $this->conversation->messages()->latest()->get(),
        ]);
    }
    public function sendMessage(){
    $formData = request()->all();

    
    if (isset($formData['message']) && !empty($formData['message'])) {
        $this->validate(['message' => 'required']);
        Message::create([
            'conversation_id' => $this->conversation->id, 
            'user_id' => auth()->id(),
            'content' => $formData['message'], 
        ]);

        $this->message = '';
        event(new MessageAdded($this->conversation->id));
    } else {
        return 'fialed';
    }

    }
    public function mount(Conversation $conversation) {
        $this->conversation = $conversation;
        $this->emit('MessageAdded');
    }

}
