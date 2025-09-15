<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        //il metodo withPivot serve a specificare quali colonne aggiuntive della tabella pivot devono essere recuperate assieme alla relazione molti a molti
        //withTimeStamps(), allo stesso modo, identifica la tabella pivot e ne recupera i timestamps
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

}
