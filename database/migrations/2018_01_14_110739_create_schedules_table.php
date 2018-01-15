<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('doctor_id');
            $table->integer('patient_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->timestamps();
            $table->softDeletes();
            $table->text('deleted_reason')->nullable();
            $table->integer('deleted_user')->nullable();
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
