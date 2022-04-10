<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('month')->nullable();
            $table->string('day')->nullable();
            $table->date('date')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('department')->nullable();
            $table->string('first_in_time')->nullable();
            $table->string('last_out_time')->nullable();
            $table->integer('hour_of_work')->nullable();
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
        Schema::dropIfExists('works');
    }
}
