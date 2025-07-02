<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $pizzas = [
            ['gusto' => 'Margherita', 'prezzo' => 5.00, 'available' => true],
            ['gusto' => 'Pepperoni', 'prezzo' => 6.50, 'available' => true],
            ['gusto' => 'Funghi', 'prezzo' => 5.50, 'available' => false],
            ['gusto' => 'Quattro Stagioni', 'prezzo' => 7.00, 'available' => true],
        ];
        return view('welcome', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic to store pizza data
    }
}
