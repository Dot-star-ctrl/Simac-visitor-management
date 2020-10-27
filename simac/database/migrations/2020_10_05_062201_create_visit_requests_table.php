<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('note');
            $table->dateTime('proposed_start_dateTime');
            $table->dateTime('proposed_end_dateTime');
            $table->timestamps();
        });
        Schema::table('visit_requests', function (Blueprint $table) {
            $table->foreignId('visitor_id')->constrained('visitors');
//            $table->foreignId('host_id')->constrained('hosts');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('department_id')->constrained('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_requests');
    }
}
