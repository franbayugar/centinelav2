<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->datetime('start_date');
            $table->datetime('finish_date')->nullable();
            $table->text('description');
            $table->unsignedInteger('working_state_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('working_state_id')->references('id')->on('working_states');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_assignments');
    }
}
