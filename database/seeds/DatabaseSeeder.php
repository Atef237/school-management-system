<?php

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
         $this->call(BloodTableSeeder::class);
         $this->call(NationalitieTableSeeder::class);
         $this->call(ReligionTableSeeder::class);
         $this->call(specializationTableSeeder::class);
         $this->call(GenderTableSeeder::class);

    }
}
