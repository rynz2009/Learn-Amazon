<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjaHppPivotTable extends Migration
{
    public function up()
    {
        Schema::create('belanja_hpp', function (Blueprint $table) {
            $table->unsignedBigInteger('belanja_id');
            $table->foreign('belanja_id', 'belanja_id_fk_3942779')->references('id')->on('belanjas')->onDelete('cascade');
            $table->unsignedBigInteger('hpp_id');
            $table->foreign('hpp_id', 'hpp_id_fk_3942779')->references('id')->on('hpps')->onDelete('cascade');
        });
    }
}
