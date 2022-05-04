<?php

use Database\Seeders\SettingTableSeeder;
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
         $this->call(SettingTableSeeder::class);

    }
}
