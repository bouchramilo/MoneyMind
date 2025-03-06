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
        Schema::create('objectifs_mensuels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('montant', 10, 2);
            $table->decimal('montant_actuel', 10, 2);
            $table->date('date_obj_debut');
            $table->date('date_obj_fin')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'date_obj_debut', 'date_obj_fin']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::dropIfExists('objectifs_mensuels');
    }
};
