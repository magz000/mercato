<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('carts', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id');
             $table->integer('product_id');
             $table->integer('quantity');
             $table->double('price', 11, 2);
             $table->double('total', 11, 2);
             $table->string('pickup_location');
             $table->date('pickup_date');
             $table->string('pickup_time');
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
         Schema::dropIfExists('carts');
     }
}
