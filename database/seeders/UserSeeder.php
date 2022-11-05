<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
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

        DB::table('user_rolls')->insert([

            'name' => 'Admin',
            'status' => '1',    

        ]);

        DB::table('user_rolls')->insert([

            'name' => 'Author',
            'status' => '2',    

        ]);

        DB::table('user_rolls')->insert([

            'name' => 'Editor',
            'status' => '3',   

        ]);
    }
}
