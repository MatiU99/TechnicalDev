<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Ticket;
use App\Notifications\DocumentosSolicitadosNotification;


class DocumentoController extends Controller
{
  public function store(Request $request, Ticket $ticket)
{
    $request->validate([
        'archivo' => 'required|file|max:10240', 
    ]);

    $archivo = $request->file('archivo');
    $ruta = $archivo->store('documentos');

    $ticket->documentos()->create([
        'nombre' => $archivo->getClientOriginalName(),
        'ruta' => $ruta,
    ]);

        $agente = User::where('role', 'agente')->first();
    if ($agente) {
        $agente->notify(new DocumentoSubidoNotification($ticket));
    }

    return back()->with('success', 'Documento subido correctamente.');
}
}
