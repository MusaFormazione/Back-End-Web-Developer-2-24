<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pizzas', function (Blueprint $table) {
            $table->boolean('available')->default(true); // Aggiunge una colonna 'available' di tipo booleano con valore predefinito true
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pizzas', function (Blueprint $table) {
            //Qui non aggiungo nulla perché tanto se faccio il rollback la tabella stessa verrà risolta.
        });
    }
};
