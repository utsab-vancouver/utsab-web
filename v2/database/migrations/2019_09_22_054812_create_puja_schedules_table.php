<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePujaSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puja_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('puja_id')->unsigned();
            $table->string('event_name')->nullable();
            $table->string('date')->nullable();
            $table->string('timings')->nullable();
            $table->string('activities')->nullable();
            $table->string('prasadam')->nullable();
            $table->boolean('is_active')->default(1);
            $table->foreign('puja_id')->references('id')->on('pujas')->onDelete('cascade');
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
        Schema::dropIfExists('puja_schedules');
    }
}
