<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBreederAndOwnerAndWebsiteFieldsToDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dogs', function (Blueprint $table) {
            //
            $table->string('website')->nullable();
            $table->string('breeder')->nullable();
            $table->string('owner')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dogs', function (Blueprint $table) {
            //
            $table->dropColumn(['website', 'breeder', 'owner']);
        });
    }
}
