@extends('Admin.sidebar')

@section('main')
    <div class="container">
        <h1>Mis Conversaciones</h1>
        <ul>
            @foreach ($conversations as $conversation)
                <li>
                    <a href="{{ route('conversationShow', $conversation) }}">

                        Conversación con {{ $conversation->admin->nombres }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
