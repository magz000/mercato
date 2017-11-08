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
            $table->increments('id');
            $table->binary('picture');
            $table->integer('provider_id');
            $table->integer('category_id');
            $table->string('name');
            $table->double('price', 11, 2);
            $table->integer('qty');
            $table->double('sale_price', 11, 2);
            $table->text('description');
            $table->date('day_start')->nullable();
            $table->date('day_end')->nullable();
            $table->integer('non_expiry')->default(0);
            $table->string('delivery_type');
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
        Schema::dropIfExists('products');
    }
}
