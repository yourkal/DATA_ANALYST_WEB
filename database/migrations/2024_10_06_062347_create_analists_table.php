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
        Schema::create('analists', function (Blueprint $table) {
            $table->id();
            $table->string('nama_material');
            $table->string('kategori');
            $table->text('keterangan')->nullable();
            $table->timestamp('waktu');
            $table->string('gambar')->nullable();
            $table->string('file_pdf')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analists');
    }
};
