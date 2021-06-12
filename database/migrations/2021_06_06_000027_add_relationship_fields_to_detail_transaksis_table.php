<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDetailTransaksisTable extends Migration
{
    public function up()
    {
        Schema::table('detail_transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_transaksi_id');
            $table->foreign('kode_transaksi_id', 'kode_transaksi_fk_3292552')->references('id')->on('transaksis');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_3949228')->references('id')->on('users');
        });
    }
}
