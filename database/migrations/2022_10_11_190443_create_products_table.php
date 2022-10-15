<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->enum('unity', ['item', 'cartoon','dozen','gram','kilogram'])->default('item'); //unity change
            $table->decimal('buy_price');
            $table->decimal('sale_price');
            $table->integer('sku');
            $table->enum('active', ['1', '0'])->default('0');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub-categories')->onDelete('cascade');
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
