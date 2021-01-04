<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->count(5)->create();
        User::factory()->count(5)->create();
        Teacher::factory()->count(5)->create();
        CourseType::create([
            'name' => 'KHÓA HỌC ONLINE'
        ]);
        CourseType::create([
            'name' => 'KHÓA HỌC OFFLINE'
        ]);
        CourseType::factory()->count(5)->create();

    }
}
