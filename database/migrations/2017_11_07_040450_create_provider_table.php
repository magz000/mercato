<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('providers', function (Blueprint $table) {
             $table->increments('id');
             $table->binary('picture');
             $table->string('firstname');
             $table->string('middlename')->nullable();
             $table->string('lastname');
             $table->string('email')->unique();
             $table->string('password');
             $table->text('bio');
             $table->string('contact');
             $table->string('street');
             $table->string('barangay');
             $table->string('city');
             $table->string('state');
             $table->string('postal_code');
             $table->integer('status')->default('1');
             $table->rememberToken();
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
         Schema::dropIfExists('providers');
     }
 }
