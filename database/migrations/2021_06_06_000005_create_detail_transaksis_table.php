<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('keterangan_desain')->nullable();
            $table->string('size');
            $table->string('warna');
            $table->integer('jumlah')->nullable();
            $table->decimal('harga', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
