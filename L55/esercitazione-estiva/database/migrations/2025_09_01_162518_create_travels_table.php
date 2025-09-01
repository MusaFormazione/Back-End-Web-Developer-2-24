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
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->string('destinazione');
            $table->date('data_partenza');
            $table->date('data_ritorno');
            $table->decimal('prezzo')->default(0);
            $table->string('descrizione');
            $table->string('immagine')->nullable();//salverò solo il nome dell'immagine, si da per scontato che tutte le immagini finiranno in storage/app/public/travels
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
