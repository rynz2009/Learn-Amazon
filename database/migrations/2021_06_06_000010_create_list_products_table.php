<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListProductsTable extends Migration
{
    public function up()
    {
        Schema::create('list_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_produk')->nullable()->unique();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('link_shopee')->nullable();
            $table->string('link_form')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
