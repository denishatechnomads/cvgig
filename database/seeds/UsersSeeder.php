<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@123'),
            'type'=>'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Alex Parker',
            'email' => 'alexparker@gmail.com',
            'password' => bcrypt('user@123'),
            'type'=>'user'
        ]);
    }
}
