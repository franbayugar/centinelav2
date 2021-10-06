<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla pivot
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('admission_date');
            $table->datetime('departure_date')->nullable();
            $table->unsignedInteger('statusrepair_id');
            $table->unsignedInteger('machine_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('action_id');
            $table->text('description');
            $table->timestamps();

            // Llaves foraneas
            $table->foreign('statusrepair_id')->references('id')->on('statusrepairs')->onDelete('cascade');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
