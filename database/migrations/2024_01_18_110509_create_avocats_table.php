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
        Schema::create('avocats', function (Blueprint $table) {
            $table->id();
            $table->string('nomV');
            $table->string('villeV');
            $table->string('adresseV');
            $table->enum('active',['non','oui']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avocats');
    }
};