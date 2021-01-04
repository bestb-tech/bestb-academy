<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_course_id');
            $table->unsignedInteger('paid_amount');
            $table->timestamp('paid_at');
            $table->unsignedTinyInteger('status')->comment('1:Đăng kí lớp,2:Thi lại');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paid_courses');
    }
}
