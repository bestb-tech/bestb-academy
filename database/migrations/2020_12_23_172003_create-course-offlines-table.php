<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOfflinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_offlines', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('location');
            $table->unsignedTinyInteger('limit_student')->nullable()->default(null);
            $table->unsignedTinyInteger('joined_student')->nullable()->default(0);
            $table->time('lesson_time')->nullable()->default(null);
            $table->unsignedBigInteger('course_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_offlines');
    }
}
