<?php

use App\Models\specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class specializationTableSeeder extends Seeder
{
    /**
     * Run the database Seeders1.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
        ];
        foreach ($specializations as $S) {
            specialization::create(['Name' => $S]);
        }
    }
}
