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
        Schema::table('analists', function (Blueprint $table) {
            $table->string('hasil_analisis')->nullable(); // Menambahkan kolom hasil analisis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('analists', function (Blueprint $table) {
            $table->dropColumn('hasil_analisis'); // Menghapus kolom jika rollback
        });
    }
};
