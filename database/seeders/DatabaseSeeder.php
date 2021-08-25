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
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \App\Models\User::truncate();

        $this->call([
            UserTableSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
