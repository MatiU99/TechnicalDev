@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Notificaciones</h1>

    @if($notificaciones->count() > 0)
        <ul>
            @foreach($notificaciones as $notificacion)
                <li class="mb-2 p-4 border rounded @if(is_null($notificacion->read_at)) bg-gray-200 @endif">
                    <div>
                        {!! $notificacion->data['mensaje'] ?? 'Nueva notificación' !!}
                    </div>
                    @if(is_null($notificacion->read_at))
                        <form action="{{ route('notificaciones.leer', $notificacion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="text-blue-600 underline">Marcar como leída</button>
                        </form>
                    @else
                        <span class="text-gray-500">Leída</span>
                    @endif
                </li>
            @endforeach
        </ul>

        {{ $notificaciones->links() }}
    @else
        <p>No tienes notificaciones nuevas.</p>
    @endif
</div>
@endsection
