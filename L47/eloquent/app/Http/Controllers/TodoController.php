<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{

    public function index(){
        $todos = Todo::all();

        //Se restituisco direttamente la variabile, così com'è allora verrà visualizzato un json
        // return $todos;

        return view('welcome', compact('todos'));
    }

}
