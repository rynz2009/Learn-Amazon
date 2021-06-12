<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjasTable extends Migration
{
    public function up()
    {
        Schema::create('belanjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->string('nama_barang');
            $table->integer('jumlah_barang');
            $table->decimal('harga', 15, 2);
            $table->longText('keterangan')->nullable();
            $table->string('sumber_bayar');
            $table->string('type_belanja');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
