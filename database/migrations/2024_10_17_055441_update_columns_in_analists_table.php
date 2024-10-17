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
            $table->renameColumn('waktu', 'tanggal'); // Rename 'waktu' to 'tanggal'
            $table->renameColumn('kategori', 'qty'); // Rename 'kategori' to 'qty'
            $table->integer('qty')->change(); // Ensure 'qty' is an integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('analists', function (Blueprint $table) {
            $table->renameColumn('tanggal', 'waktu');
            $table->renameColumn('qty', 'kategori');
            $table->string('kategori')->change(); // Revert back 'kategori' to its original type if needed
        });
    }
};
