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
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(Question_testSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(RegisterSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(NewSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(StudentSeeder::class);

    }
}
