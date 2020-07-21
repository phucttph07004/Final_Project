<?php

use Illuminate\Database\Seeder;
use App\Models\Register;
class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Register::class, 10)->create();
    }
}
