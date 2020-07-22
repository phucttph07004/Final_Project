<?php

use Illuminate\Database\Seeder;
use App\Models\{Homework};
class HomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Homework::class, 10)->create();
    }
}
