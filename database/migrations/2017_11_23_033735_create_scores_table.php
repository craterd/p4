<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->date('date');
            $table->integer('score');
            $table->string('course_name');
            $table->integer('birdies');
            $table->integer('eagles');
            $table->integer('bogies');
            $table->integer('putts');
            $table->integer('chips');
            $table->integer('fairways_hit');
            $table->integer('greens_in_regulation');
            $table->integer('longest_drive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
        Schema::dropIfExists('courses');
    }
}
