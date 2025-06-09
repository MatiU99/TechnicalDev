@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle del Ticket</h1>

        <div class="card p-4 mb-4">
            <p><strong>Nombre:</strong> {{ $ticket->nombre }}</p>
            <p><strong>Tipo:</strong> {{ $ticket->tipo }}</p>
            <p><strong>Medio de transporte:</strong> {{ $ticket->medio_transporte }}</p>
            <p><strong>Origen:</strong> {{ $ticket->pais_origen }}</p>
            <p><strong>Destino:</strong> {{ $ticket->pais_destino }}</p>
            <p><strong>Destino:</strong> {{ $ticket->destino }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($ticket->estado) }}</p>
        </div>

        <h2>Subir documento</h2>
        @if (session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form action="{{ route('documentos.store', $ticket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="archivo">Documento:</label>
                <input type="file" name="archivo" required>
            </div>
            <button type="submit">Subir</button>
        </form>

        <h3 class="mt-5">Documentos existentes</h3>
        @if ($ticket->documentos->isEmpty())
            <p>No hay documentos adjuntos.</p>
        @else
            <ul>
                @foreach ($ticket->documentos as $doc)
                    <li>
                        <a href="{{ asset('storage/' . $doc->ruta) }}" target="_blank">{{ $doc->nombre }}</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('tickets.index') }}" class="btn btn-secondary mt-4">Volver</a>
    </div>
@endsection