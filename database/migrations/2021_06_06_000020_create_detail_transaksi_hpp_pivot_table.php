<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiHppPivotTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi_hpp', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_transaksi_id');
            $table->foreign('detail_transaksi_id', 'detail_transaksi_id_fk_3292240')->references('id')->on('detail_transaksis')->onDelete('cascade');
            $table->unsignedBigInteger('hpp_id');
            $table->foreign('hpp_id', 'hpp_id_fk_3292240')->references('id')->on('hpps')->onDelete('cascade');
        });
    }
}
