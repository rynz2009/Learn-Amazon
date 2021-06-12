<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHppsTable extends Migration
{
    public function up()
    {
        Schema::create('hpps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_hpp')->unique();
            $table->string('nama')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
