<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiAffsTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_affs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_transaksi')->unique();
            $table->date('tanggal');
            $table->string('nama');
            $table->longText('alamat');
            $table->string('kota');
            $table->string('propinsi');
            $table->string('no_wa');
            $table->integer('jumlah')->nullable();
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->decimal('ongkir', 15, 2)->nullable();
            $table->decimal('grand_total', 15, 2)->nullable();
            $table->string('no_awb')->nullable();
            $table->string('status')->nullable();
            $table->string('pembayaran')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
