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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroD');
            $table->foreignId('avocat_id');
            $table->string('commission');
            $table->date('dateDossier');
            $table->string('refJuridique');
            $table->string('refDecision');
            $table->foreignId('tribunale_id');
            $table->foreignId('benificier_id');
            $table->date('dateAideJustice');
            $table->float('prix');
            $table->enum('validate',['oui','non']);
            $table->string('refPerfermance');
            $table->string('refEngagement');
            $table->string('refEditions');
            $table->date('date_ds_aide_etat');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};