<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListProductNichePivotTable extends Migration
{
    public function up()
    {
        Schema::create('list_product_niche', function (Blueprint $table) {
            $table->unsignedBigInteger('list_product_id');
            $table->foreign('list_product_id', 'list_product_id_fk_3205718')->references('id')->on('list_products')->onDelete('cascade');
            $table->unsignedBigInteger('niche_id');
            $table->foreign('niche_id', 'niche_id_fk_3205718')->references('id')->on('niches')->onDelete('cascade');
        });
    }
}
