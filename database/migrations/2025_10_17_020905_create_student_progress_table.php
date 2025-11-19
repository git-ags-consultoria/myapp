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
        Schema::create('student_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('modality_id')->constrained('modalities')->cascadeOnDelete();
            $table->foreignId('graduation_format_id')->constrained('graduation_formats')->cascadeOnDelete();
            $table->foreignId('graduation_degree_id')->nullable()->constrained('graduation_degrees')->nullOnDelete();
            $table->date('achieved_at')->nullable();
            $table->string('status')->default('in_progress'); // in_progress | achieved | pending
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_progress');
    }
};
