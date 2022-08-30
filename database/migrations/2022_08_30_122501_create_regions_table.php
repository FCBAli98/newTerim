<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz', 50);
            $table->string('name_ru', 50);
            $table->string('name_en', 50);
            $table->string('name_cyrl', 50);
            $table->string('hc_key', 10);
            $table->integer('c_order');
            $table->integer('ns10_code');
            $table->integer('soato');
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
        Schema::dropIfExists('regions');
    }
}
