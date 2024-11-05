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
        $table->integer('barang_masuk')->nullable()->change();
        $table->integer('barang_keluar')->nullable()->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('produksis', function (Blueprint $table) {
        $table->integer('barang_masuk')->nullable(false)->change();
        $table->integer('barang_keluar')->nullable(false)->change();
    });
}
};
