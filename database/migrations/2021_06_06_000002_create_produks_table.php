<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_produk')->unique();
            $table->string('nama_produk');
            $table->longText('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
