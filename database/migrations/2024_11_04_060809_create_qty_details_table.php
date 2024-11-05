<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('qty_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('analist_id')->constrained()->onDelete('cascade'); // Foreign key untuk menghubungkan ke tabel analists
            $table->date('tanggal');
            $table->time('jam');
            $table->string('nama_material');
            $table->integer('barang_masuk');
            $table->integer('barang_keluar');
            $table->string('gambar')->nullable(); // Kolom opsional untuk gambar
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qty_details');
    }
};
