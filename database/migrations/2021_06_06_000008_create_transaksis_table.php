<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_transaksi')->unique();
            $table->date('tanggal');
            $table->string('nama');
            $table->string('no_wa');
            $table->longText('alamat');
            $table->string('propinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->decimal('ongkir', 15, 2)->nullable();
            $table->string('no_awb')->nullable();
            $table->string('status');
            $table->longText('keterangan')->nullable();
            $table->string('pembayaran');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
