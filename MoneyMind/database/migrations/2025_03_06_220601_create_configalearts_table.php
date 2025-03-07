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
        Schema::create('configalearts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal("pourcentage",10,2)->default(0);
            $table->decimal("pourcentage_actuel",10,2)->default(0);
            $table->enum("seuilType", ["seuil_global","seuil_categorie"])->default("seuil_categorie");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configalearts');
    }
};
