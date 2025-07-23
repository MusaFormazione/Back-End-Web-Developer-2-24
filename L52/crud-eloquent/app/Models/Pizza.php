<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    //Questa variabile distanza deve contenere i nomi dei campi dei database che sono aggiornabili al livello del database, In caso contrario i tentativi di modifica avverranno rifiutati
    protected $fillable = ['gusto','prezzo','active'];
}
