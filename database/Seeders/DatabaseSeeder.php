<?php
namespace Database\Seeders;

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
    //     $this->call(BloodTableSeeder::class);
//         $this->call(NationalitieTableSeeder::class);
//         $this->call(ReligionTableSeeder::class);
//         $this->call(specializationTableSeeder::class);
//         $this->call(GenderTableSeeder::class);
//         $this->call(SettingTableSeeder::class);
      //   $this->call(StudentTableSeeder::class);
//         $this->call(TeacherSeeder::class);
//         $this->call(ParentSeeder::class);
       //$this->call(UserTableSeeder::class);


        $this->call([
            StudentTableSeeder::class,
            TeacherTableSeeder::class,
            ParentTableSeeder::class,
            UserTableSeeder::class,
        ]);


    }
}
