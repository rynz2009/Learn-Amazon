<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiProdukPivotTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi_produk', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_transaksi_id');
            $table->foreign('detail_transaksi_id', 'detail_transaksi_id_fk_3201341')->references('id')->on('detail_transaksis')->onDelete('cascade');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id', 'produk_id_fk_3201341')->references('id')->on('produks')->onDelete('cascade');
        });
    }
}
