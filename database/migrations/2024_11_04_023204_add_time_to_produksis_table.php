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
    Schema::table('produksis', function (Blueprint $table) {
        $table->time('jam')->nullable(); // Menambahkan kolom jam
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('produksis', function (Blueprint $table) {
        $table->dropColumn('jam'); // Menghapus kolom jam jika rollback
    });
}
};
