<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegistroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Registro::factory()->count(10)->create();
    }
}
