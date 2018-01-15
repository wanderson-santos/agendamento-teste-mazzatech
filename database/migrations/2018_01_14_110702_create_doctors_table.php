<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("crm");
            $table->text("expertise")->nullable();
            $table->string("email")->nullable();
            $table->text("observation")->nullable();
            $table->string("phone")->nullable();
            $table->string("cellphone")->nullable();
            $table->string("civil_status")->nullable();
            $table->char("sex", 1);
            $table->date("birth");
            $table->string("street")->nullable();
            $table->string("number")->nullable();
            $table->string("district")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("cep")->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
