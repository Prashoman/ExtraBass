<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Prashoman',
            'email' => 'prashomanchakrabarti1@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 2,
            'created_at' => Carbon::now(),
        ]);
    }
}
