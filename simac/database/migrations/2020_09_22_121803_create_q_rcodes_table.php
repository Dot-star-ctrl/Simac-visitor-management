<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQRcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_rcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fisrt_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('floor');
            $table->string('number');
            $table->integer('phone_number');
            $table->timestamps();
        });
        Schema::table('q_rcodes', function (Blueprint $table) {
            $table->foreignId('visitor_id')->constrained('visitors');
            $table->foreignID('schedule_id')->constrained('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('q_rcodes');
    }
}
