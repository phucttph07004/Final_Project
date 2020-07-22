<?php

use Illuminate\Database\Seeder;
use App\Models\{Writing_essay};
class Writing_essaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Writing_essay::class, 10)->create();
    }
}
