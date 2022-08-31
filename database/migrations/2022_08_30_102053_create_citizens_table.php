<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('patronymic');
            $table->string('phone_number');
            $table->string('address');
            $table->string('passport_seria', 20);
            $table->string('passport_number', 20);
            $table->integer('resource');
            $table->integer('sync_id');
            $table->integer('gender');
            $table->integer('synced')->default(0);
            $table->smallInteger('status')->default(1);
            $table->integer('sent_region_id');
            $table->integer('sent_city_id');
            $table->integer('sent_status');
            $table->integer('sms_code');
            $table->integer('lifetime');
            $table->integer('wanted_region_id');
            $table->integer('wanted_territory');
            $table->date('birth_date');
            $table->string('passport', 100);
            $table->string('pin', 255);
            $table->integer('in_notebook');
            $table->integer('social_protection');
            $table->string('contract_number', 30);
            $table->date('contract_date');
            $table->integer('type_employer_id');
            $table->integer('region_id');
            $table->integer('city_id');
            $table->bigInteger('makhalla_id');
            $table->integer('otryad_id');
            $table->string('company_tin',30);
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
        Schema::dropIfExists('citizens');
    }
}
