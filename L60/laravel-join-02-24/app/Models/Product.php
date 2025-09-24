<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders(){
        //il metodo withPivot serve a specificare quali colonne aggiuntive della tabella pivot devono essere recuperate assieme alla relazione molti a molti
        //withTimeStamps(), allo stesso modo, identifica la tabella pivot e ne recupera i timestamps
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }
}
