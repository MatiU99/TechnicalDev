<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = ['nombre', 'ruta', 'ticket_id'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}