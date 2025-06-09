<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NuevoTicketNotification;

class TicketController extends Controller
{

      public function create()
    {
        return view('tickets.create');
    }

    public function index()
    {
        $tickets = \App\Models\Ticket::latest()->get(); // 👉 muestra todos los tickets
        return view('tickets.index', compact('tickets'));
    }


public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|in:1,2,3',
        'transporte' => 'required|in:aereo,terrestre,maritimo',
        'producto' => 'required|string|max:255',
        'origen' => 'required|string|max:255',
        'destino' => 'required|string|max:255',
    ]);

    $ticket = new Ticket();
    $ticket->nombre = $request->nombre;
    $ticket->tipo = $request->tipo;
    $ticket->transporte = $request->transporte;
    $ticket->producto = $request->producto;
    $ticket->pais_origen = $request->origen;
    $ticket->pais_destino = $request->destino;
    $ticket->estado = 'nuevo';
    $ticket->user_id = auth()->id();
    $ticket->save();


    $agente = User::where('role', 'agente')->first();
    if ($agente) {
        $agente->notify(new NuevoTicketNotification($ticket));
    }

    return redirect()->route('tickets.index')->with('success', 'Ticket creado con éxito.');
}

    public function show(Ticket $ticket)
    {
        //$this->authorize('view', $ticket);
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
    }

    public function update(Request $request, Ticket $ticket)
    {
    }

    public function destroy(Ticket $ticket)
    {
    }
}
