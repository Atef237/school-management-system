<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database Seeders1.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'student ',
            'email' => 'test@test.com',
            'password' => bcrypt(12345),
            'gender_id' => 1,
            'nationalitie_id' => 4,
            'blood_id' => 2,
            'Grade_id' => 3,
            'Classroom_id' => 4,
            'school_years_id' => 3,
            'parent_id' => 5,
            'academic_year' => 2023,

        ]);
    }
}
