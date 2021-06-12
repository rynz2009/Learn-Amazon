<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenerimaanCodPenerimaanCodPivotTable extends Migration
{
    public function up()
    {
        Schema::create('detail_penerimaan_cod_penerimaan_cod', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_penerimaan_cod_id');
            $table->foreign('detail_penerimaan_cod_id', 'detail_penerimaan_cod_id_fk_3916066')->references('id')->on('detail_penerimaan_cods')->onDelete('cascade');
            $table->unsignedBigInteger('penerimaan_cod_id');
            $table->foreign('penerimaan_cod_id', 'penerimaan_cod_id_fk_3916066')->references('id')->on('penerimaan_cods')->onDelete('cascade');
        });
    }
}
