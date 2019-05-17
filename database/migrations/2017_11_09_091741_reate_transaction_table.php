<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('order_transactions', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('order_id');
             $table->string('payment_id');
             $table->string('payer_id');
             $table->string('method');
             $table->string('first_name')->nullable();
             $table->string('middle_name')->nullable();
             $table->string('last_name')->nullable();
             $table->integer('employee_id')->nullable();
             $table->string('status');
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
         Schema::dropIfExists('order_transactions');
     }
}
