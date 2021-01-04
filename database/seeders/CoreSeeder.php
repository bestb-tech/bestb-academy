<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\CourseType;
use Illuminate\Database\Seeder;

class CoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseType::create([
            'name' => 'KHÓA HỌC ONLINE'
        ]);
        CourseType::create([
            'name' => 'KHÓA HỌC OFFLINE'
        ]);
        Admin::create([
            'user_name' => 'admin',
            'full_name' => 'admin',
            'password' => \Hash::make('password'),
            'email' => 'admin@mail.com',
            'phone_number' => '123',
            'avatar' => ''
        ]);
    }
}
