<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DocumentoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*    Route::get('/notificaciones', function () {
        $notificaciones = auth()->user()->notifications()->paginate(10);
        return view('notificaciones.index', compact('notificaciones'));
    })->name('notificaciones.index');

    Route::post('/notificaciones/{id}/leer', function ($id) {
        $notificacion = auth()->user()->notifications()->find($id);
        if ($notificacion) {
            $notificacion->markAsRead();
        }
        return back();
    })->name('notificaciones.leer');*/

Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);
});
Route::post('documentos/{ticket}', [DocumentoController::class, 'store'])->name('documentos.store');


require __DIR__.'/auth.php';
