<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname' => 'Admin',
            'email' => 'Admin@bmdb.id',
            // 'username' => 'admin',
            'password' => bcrypt('123123123'),
            'role' => 'admin',
        ]);
    }
}
