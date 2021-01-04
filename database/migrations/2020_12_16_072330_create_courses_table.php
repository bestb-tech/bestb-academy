<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('course_type_id');
            $table->text('description')->nullable()->default(null);
            $table->text('short_description')->nullable()->default(null);
            $table->unsignedInteger('base_price')->nullable()->default(null);
            $table->unsignedInteger('sell_price')->nullable()->default(null);
            $table->text('img');
            $table->text('google_form_url')->nullable()->default(null);
            $table->text('google_sheet_url')->nullable()->default(null);
            $table->string('certificate_name');
            $table->string('certificate_img_url');
            $table->unsignedTinyInteger('pass_point');
            $table->timestamps();
            $table->timestamp('release_at')->nullable();
            $table->unsignedTinyInteger('status')->comment('1:Đang học, 2: Mở đăng kí, 3:Lớp đầy')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
