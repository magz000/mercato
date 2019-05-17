<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('order_products', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('order_id');
             $table->integer('product_id');
             $table->integer('provider_id');
             $table->integer('quantity');
             $table->double('price', 11, 2);
             $table->double('total', 11, 2);
             $table->string('pickup_location');
             $table->date('pickup_date');
             $table->string('pickup_time');
             $table->text('note')->nullable();
             $table->integer('progress')->default('1');
             $table->integer('status')->default('1');
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
         Schema::dropIfExists('order_products');
     }
}
