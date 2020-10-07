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
            $table->integer('visitor_id');
            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->integer('host_id')->nullable()->unsigned();
            $table->foreign('host_id')->references('id')->on('hosts');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->dateTime('dateTime');
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
        Schema::dropIfExists('visit_requests');
    }
}
