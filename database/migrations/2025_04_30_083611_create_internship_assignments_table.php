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
        Schema::create('internship_assignments', function (Blueprint $table) {
            $table->id();
            // Relación al estudiante
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Tutor que asignó
            $table->foreignId('tutor_assigner_id')->constrained('users')->onDelete('cascade');
            // Relación a la empresa
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Pending', 'Approved', 'Finished'])->default('Pending');
            $table->unique(['user_id', 'company_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_assignments');
    }
};
