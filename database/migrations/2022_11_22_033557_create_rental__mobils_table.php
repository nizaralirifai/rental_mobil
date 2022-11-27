<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental__mobils', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('warna');
            $table->string('tahun_pembuatan');
            $table->string('tipe');
            $table->string('tempat_duduk');
            $table->string('bahan_bakar');
            $table->string('audio');
            $table->string('aksesoris');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental__mobils');
    }
};
