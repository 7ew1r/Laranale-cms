<?php

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
            [
                'id' => '1',
                'name' => 'user1',
                'email' => 'user1@example.com',
                'password' => 'pass'
            ],
            [
                'id' => '2',
                'name' => 'user2',
                'email' => 'user2@example.com',
                'password' => 'pass'
            ],
            [
                'id' => '3',
                'name' => 'user3',
                'email' => 'user3@example.com',
                'password' => 'pass'
            ],
        ]);
    }
}
