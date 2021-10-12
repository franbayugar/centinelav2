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
            $table->integer('id_user')->unsigned();
            $table->integer('id_task')->unsigned();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_task')->references('id')->on('work_assignments');
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
