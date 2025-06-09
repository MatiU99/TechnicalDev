<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'transporte',
        'producto',
        'pais_origen',
        'pais_destino',
        'estado',
        'user_id',
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
