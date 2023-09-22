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

    // Verifica que el campo 'message' esté presente y no esté vacío
    if (isset($formData['message']) && !empty($formData['message'])) {
        // El campo 'message' contiene datos, puedes crear el mensaje
        $this->validate(['message' => 'required']);
        Message::create([
            'conversation_id' => $this->conversation->id, 
            'user_id' => auth()->id(),
            'content' => $formData['message'], // Utiliza el valor del campo 'message'
        ]);

        // Limpia el campo de mensaje después de enviarlo
        $this->message = '';

        // Emite el evento para actualizar la interfaz en tiempo real
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
