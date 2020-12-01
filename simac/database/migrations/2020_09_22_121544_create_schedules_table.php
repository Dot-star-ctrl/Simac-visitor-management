<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateTime');
            $table->string('host_message');
            $table->tinyInteger('floor');
            $table->string('phone_number');
            $table->timestamps();
        });
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreignId('host_id')->constrained('hosts');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('office_id')->constrained('offices');
            $table->foreignId('visitor_id')->constrained('visitors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
