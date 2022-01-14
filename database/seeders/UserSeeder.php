<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'first_name'      => 'Cyber',
            'last_name'      => 'Olympus',
            'email'     => 'admin@cyberolympus.com',
            'password'  => Hash::make('cyberadmin'),
        ]);
    }
}
