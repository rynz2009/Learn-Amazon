<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_cs_id')->nullable();
            $table->foreign('kode_cs_id', 'kode_cs_fk_3202800')->references('id')->on('users');
        });
    }
}
