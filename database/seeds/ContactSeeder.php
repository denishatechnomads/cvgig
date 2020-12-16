<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' => rand(10000,99999).rand(10000,99999),
            'subject' => Str::random(50),
            'message' => Str::random(100),
        ]);
    }
}
