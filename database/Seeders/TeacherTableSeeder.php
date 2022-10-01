<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database Seeders1.
     *
     * @return void
     */
    public function run()
    {
       DB::table('teachers')->insert([
           'email' => 'test@test.com',
           'password' => bcrypt(12345),
           'name' => json_encode(['ar' => 'معلم','en' => 'teacher']),
           'Specialization_id' => 2,
           'Gender_id' => 1,
           'Joining_Date' => date(),
           'Address' => 'test test test test test test test test test test ',
       ]);
    }
}


//DB::table('users')->insert([
//    'name' => 'user',
//    'email' => 'test@test.com',
//    'password' => bcrypt('12345'), // 12345
//    'remember_token' => Str::random(10),
//]);
