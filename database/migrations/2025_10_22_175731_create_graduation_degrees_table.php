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
        Schema::create('graduation_degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('graduation_format_id')->constrained('graduation_formats')->cascadeOnDelete();
            $table->integer('degree_number'); // 1, 2, 3, 4
            $table->integer('required_classes')->default(30); // nº de presenças necessárias
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduation_degrees');
    }
};
