<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersWorkAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_work_assignments', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('work_assignment_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('work_assignment_id')->references('id')->on('work_assignments');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_work_assignments', function (Blueprint $table) {
            Schema::dropIfExists('user_task');
            //
        });
    }
}
