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
            $table->string('code');
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
