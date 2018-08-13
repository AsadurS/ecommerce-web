<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('pro_id');
              $table->string('pro_name');
            $table->integer('category_id');
            $table->integer('id');
            $table->longText('pro_short_des');
            $table->longText('pro_long_des');
            $table->float('pro_price');
            $table->string('pro_image');
            $table->string('pro_size');
            $table->string('pro_color');
            $table->integer('pro_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
