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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id(); // clé primaire

            $table->string('num_apogee')->unique(); // numéro Apogée unique
            $table->string('nom');                 // nom de l’étudiant
            $table->string('prenom');              // prénom
            $table->string('email')->nullable();   // email (optionnel)
            $table->string('tele')->nullable();    // téléphone (optionnel)
            $table->string('photo')->nullable();   // chemin de la photo

            $table->timestamps(); // created_at / updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
