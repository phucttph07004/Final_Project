<?php

use Illuminate\Database\Seeder;
use App\Models\{Lesson_content};
class Lesson_contentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lesson_content::class, 10)->create();
    }
}
