<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database Seeders1.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_parents')->insert([
            'Email' => 'test@test.com',
            'password' => bcrypt(12345),
            'Name_Father' => json_encode(['ar' => 'ولي أمر','en'=>'parent']),
            'National_ID_Father' => 3,
            'Passport_ID_Father' => 2,
            'Phone_Father' => '123456789',
            'Job_Father' => 'thgfsda',
            'Nationality_Father_id' => 3,
            'Blood_Type_Father_id' => 4,
            'Religion_Father_id' => 2,
            'Address_Father' => 'rtgfd trfwedsV FDA',
            'Name_Mother' => 'YHRTGEWF YRTERVC RBEVWCDS',
            'National_ID_Mother' => '876543567E',
            'Passport_ID_Mother' => '87654323456',
            'Phone_Mother' => '8675643',
            'Job_Mother' => 'YRTGERFE RTBERVDCA',
            'Nationality_Mother_id' => 5,
            'Blood_Type_Mother_id' => 3,
            'Religion_Mother_id' => 3,
            'Address_Mother' => 'HFGDSA',
        ]);
    }
}
