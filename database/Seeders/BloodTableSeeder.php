<?php

use App\Models\typeBlood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database Seeders1.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_bloods')->delete();  // delete the old
        $bloods = ['o-','o+','A+','A-','B+','B-','AB+','AB-'];

        foreach ($bloods as $blood){
            typeBlood::create(['name'=>$blood]);
        }
    }
}
