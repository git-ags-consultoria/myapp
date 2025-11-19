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
        Schema::create('graduation_formats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modality_id')->constrained('modalities')->cascadeOnDelete();
            $table->string('belt_name');
            $table->string('belt_color');
            $table->integer('min_age')->default(0);
            $table->integer('min_months')->default(0); // tempo mínimo na faixa anterior
            $table->integer('order')->default(0); // ordem hierárquica
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduation_formats');
    }
};
