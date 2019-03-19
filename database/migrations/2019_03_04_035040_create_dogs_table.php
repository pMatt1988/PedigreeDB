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
            $table->integer('sireid');
            $table->integer('damid');
            $table->string('sex');
            $table->date('dob');
            $table->string('pretitle', 32);
            $table->string('posttitle', 32);
            $table->string('reg', 64);
            $table->string('color', 64);
            $table->string('markings', 64);
            $table->boolean('fss');
            $table->boolean('rat');
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
