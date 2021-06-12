<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServicesTable extends Migration
{
    public function up()
    {
        Schema::create('customer_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_cs')->unique();
            $table->string('nama');
            $table->string('no_wa')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
