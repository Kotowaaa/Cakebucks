<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Samsudin',
            'password' => bcrypt('12345'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sambo',
            'password' => bcrypt('12345'),
        ]);
        DB::table('users')->insert([
            'name' => 'Udin',
            'password' => bcrypt('12345'),
        ]);
    }
}
