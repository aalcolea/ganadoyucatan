@extends('Admin.sidebar')
@section('main')
@livewire('chat', ['conversation' => $conversation])
    <div class="container">
        <h1>Chat con {{ $conversation->admin->nombres }}</h1>

        <div class="chat-box">
            @foreach ($conversation->messages as $message)
                <div class="message">
                    <strong>{{ $message->user->nombres }}:</strong>
                    <p>{{ $message->content }}</p>
                </div>
            @endforeach
        </div>

{{--         @if (!$conversation->closed)
            <form wire:submit.prevent="sendMessage">
                <input type="text" wire:model="message" placeholder="Escribe un mensaje">
                <button type="submit">Enviar</button>
            </form>
        @else
            <p>Esta conversación ha sido cerrada.</p>
        @endif --}}
    </div>
<script>
    document.addEventListener('livewire:load', function () {
        window.Echo.private('chat.' + {{ $conversation->id }})
            .listen('MessageAdded', () => {
            });
    });
</script>
@endsection