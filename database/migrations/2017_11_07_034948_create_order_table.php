<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->double('total', 11, 2);
            $table->double('service_charge', 11, 2);
            $table->double('tax', 11, 2)->nullable();
            $table->string('firstname');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('state');
            $table->string('contact');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
