<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNichesTable extends Migration
{
    public function up()
    {
        Schema::create('niches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('niche')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
