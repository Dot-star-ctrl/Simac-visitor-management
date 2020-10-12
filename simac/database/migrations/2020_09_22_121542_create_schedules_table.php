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
            $table->foreignId('host_id')->constrained('hosts');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('department_id')->constrained('departments');
            $table->date('dateTime');
            $table->foreignId('office_id')->constrained('offices');
            $table->string('host_message');
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
        Schema::dropIfExists('schedules');
    }
}
