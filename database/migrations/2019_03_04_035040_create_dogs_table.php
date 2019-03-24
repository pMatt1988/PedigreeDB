<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string("name", 32);
            $table->integer('sireid')->nullable();
            $table->integer('damid')->nullable();
            $table->string('sex');
            $table->date('dob')->nullable();
            $table->string('pretitle', 32)->nullable();
            $table->string('posttitle', 32)->nullable();
            $table->string('reg', 64)->nullable();
            $table->string('color', 64)->nullable();
            $table->string('markings', 64)->nullable();
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
        Schema::dropIfExists('dogs');
    }
}
