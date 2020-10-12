<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostAttendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_attendings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::table('host_attendings', function (Blueprint $table) {
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('host_id')->constrained('hosts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('host_attendings');
    }
}
