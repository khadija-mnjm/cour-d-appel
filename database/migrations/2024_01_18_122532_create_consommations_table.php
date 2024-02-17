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
        Schema::create('compteurs', function (Blueprint $table) {
            $table->id();
            $table->float('refCompteur')->nullable();
            $table->foreignId('tribunale_id');
            $table->date('date');
            $table->float('valeur');
            $table->enum('type', ['eau', 'electrique'])->default('electrique');
            $table->tinyInteger('etat')->default(0);
            $table->float('moyenne')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('consommations');
    }
};