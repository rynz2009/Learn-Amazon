<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServiceTransaksiPivotTable extends Migration
{
    public function up()
    {
        Schema::create('customer_service_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('transaksi_id', 'transaksi_id_fk_3548889')->references('id')->on('transaksis')->onDelete('cascade');
            $table->unsignedBigInteger('customer_service_id');
            $table->foreign('customer_service_id', 'customer_service_id_fk_3548889')->references('id')->on('customer_services')->onDelete('cascade');
        });
    }
}
