<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanCodsTable extends Migration
{
    public function up()
    {
        Schema::create('penerimaan_cods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pcod')->unique();
            $table->date('tanggal');
            $table->decimal('jumlah', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
