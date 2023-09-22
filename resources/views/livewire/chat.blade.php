<div>
    <h2>Chat con {{ $conversation->admin->nombres }}</h2>

    <div>
        @foreach ($messages as $message)
            <p>{{ $message->user->name }}: {{ $message->body }}</p>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage">
        <input type="text" wire:model="message"  placeholder="Escribe un mensaje">
        <button type="submit">Enviar</button>
    </form>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.Echo.private('chat.' + {{ $conversation->id }})
            .listen('MessageAdded', (e) => {
                 console.log('Evento MessageAdded recibido:', e)
            });
    });
</script>