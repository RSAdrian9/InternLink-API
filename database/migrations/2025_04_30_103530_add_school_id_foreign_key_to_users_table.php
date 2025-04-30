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
        Schema::table('users', function (Blueprint $table) {
            // Asegúrate que la columna 'school_id' exista antes de añadir la FK
            if (Schema::hasColumn('users', 'school_id')) {
                $table->foreign('school_id')
                      ->references('id')
                      ->on('schools')
                      ->onDelete('set null'); // O la acción que prefieras: cascade, restrict, etc.
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Nombre de la FK por defecto: nombredetabla_columna_foreign
            $table->dropForeign(['school_id']); // O $table->dropForeign('users_school_id_foreign');
        });
    }
};
