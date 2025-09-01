<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['titolo','destinazione','prezzo','data_partenza','data_ritorno','descrizione', 'immagine'];
}
