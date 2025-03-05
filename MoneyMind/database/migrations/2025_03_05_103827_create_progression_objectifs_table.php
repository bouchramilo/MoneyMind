<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('progression_objectifs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('objectif_id')->constrained('objectifs_mensuels')->onDelete('cascade');
            $table->decimal('montant_epargne_actuel', 10, 2)->default(0);
            $table->decimal('pourcentage_atteint', 5, 2)->default(0);
            $table->timestamp('date_mise_a_jour')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progression_objectifs');
    }
};
