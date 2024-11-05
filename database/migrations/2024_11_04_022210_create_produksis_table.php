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
        Schema::create('produksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('gambar')->nullable();
            $table->string('nama_material');
            $table->integer('barang_masuk');
            $table->integer('barang_keluar');
            $table->integer('jumlah_akhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksis');
    }
};
