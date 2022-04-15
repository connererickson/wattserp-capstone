<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWriteUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_write_up', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_name');
            $table->string('employee_id');
            $table->string('job_title');
            $table->string('manager');
            $table->string('department');
            $table->string('service');
            $table->string('type_of_warning');
            $table->string('type_of_offense');
            $table->string('infraction_description');
            $table->string('improvement_plan');
            $table->string('infraction_consequences');
            $table->date('date');
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
        Schema::dropIfExists('employee_write_up');
    }
}
