<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransaksiAffsTable extends Migration
{
    public function up()
    {
        Schema::table('transaksi_affs', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_produk_id');
            $table->foreign('kode_produk_id', 'kode_produk_fk_3201381')->references('id')->on('list_products');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_3950171')->references('id')->on('users');
        });
    }
}
