<?php

use Illuminate\Database\Seeder;
use App\Models\{Branch};
class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Branch::class, 10)->create();
    }
}
