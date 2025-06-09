@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Tickets</h1>

    <a href="{{ route('tickets.create') }}">+ Crear nuevo ticket</a>

    <ul>
        @foreach ($tickets as $ticket)
            <li>
                <a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->nombre }}</a>
                - Estado: {{ $ticket->estado }}
            </li>
        @endforeach
    </ul>
</div>
@endsection