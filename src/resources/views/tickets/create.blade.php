@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Ticket</h1>

    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nombre del ticket:</label>
            <input type="text" name="nombre" required>
        </div>

        <div>
            <label>Tipo de ticket:</label>
            <select name="tipo">
                <option value="1">Tipo 1</option>
                <option value="2">Tipo 2</option>
                <option value="3">Tipo 3</option>
            </select>
        </div>

        <div>
            <label>Medio de transporte:</label>
            <select name="transporte">
                <option value="aereo">Aéreo</option>
                <option value="terrestre">Terrestre</option>
                <option value="maritimo">Marítimo</option>
            </select>
        </div>

        <div>
            <label>Producto:</label>
            <input type="text" name="producto" required>
        </div>

        <div>
            <label>País origen:</label>
            <input type="text" name="origen" required>
        </div>

        <div>
            <label>País destino:</label>
            <input type="text" name="destino" required>
        </div>
        <button type="submit">Crear</button>
    </form>
        <a href="{{ route('tickets.index') }}" style="display: inline-block; margin-top: 20px;">Volver a listado de tickets</a>
</div>
@endsection
