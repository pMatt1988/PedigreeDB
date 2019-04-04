<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSireAndDamAddNullableToSireIdAndDamId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dogs', function (Blueprint $table) {
            $table->dropColumn(['sire', 'dam']);
            $table->integer('sire_id')->default(0)->change();
            $table->integer('dam_id')->default(0)->change();
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
            $table->string('sire', 32)->nullable();
            $table->string('dam', 32)->nullable();
            $table->integer('sire_id')->default(null)->change();
            $table->integer('dam_id')->default(null)->change();

        });
    }
}
