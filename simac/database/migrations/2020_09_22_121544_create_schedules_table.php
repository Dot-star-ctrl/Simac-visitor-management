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
            $table->timestamps();
        });
//        Schema::table('schedules', function (Blueprint $table) {
//            $table->foreignId('host_id')->constrained('hosts');
//            $table->foreignId('company_id')->constrained('companies');
//            $table->foreignId('department_id')->constrained('departments');
//            $table->foreignId('office_id')->constrained('offices');
//        });
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
