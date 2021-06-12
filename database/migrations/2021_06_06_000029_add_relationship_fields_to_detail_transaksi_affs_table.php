<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDetailTransaksiAffsTable extends Migration
{
    public function up()
    {
        Schema::table('detail_transaksi_affs', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_transaksi_id');
            $table->foreign('kode_transaksi_id', 'kode_transaksi_fk_3201375')->references('id')->on('transaksi_affs');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_3950173')->references('id')->on('users');
        });
    }
}
