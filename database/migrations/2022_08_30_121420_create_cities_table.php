<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz', 50);
            $table->string('name_ru', 50);
            $table->string('name_en', 50);
            $table->string('name_cyrl', 50);
            $table->integer('phone_kod');
            $table->integer('c_order',5);
            $table->integer('ns11_code');
            $table->integer('soato');
            $table->timestamps();



            $table->foreign('region_id')->references('id')->on('region');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
