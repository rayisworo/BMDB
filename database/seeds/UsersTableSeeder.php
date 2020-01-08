<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\carbon;

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
            'fullname' => 'admin',
            'email' => 'admin@bmdb.id',
            'password' => bcrypt('123123123'),
            'gender' => 'male',
            'address' => 'address admin',
            'dob' => Carbon::create('1212','12','12'),
            'profilePicture' => 'ppR2.png',
            'role' => 'admin',
        ]);
        for($i=0; $i<10; $i++){
            User::create([
                'fullname' => 'user'.$i,
                'email' => 'user'.$i.'@bmdb.id',
                'password'=> bcrypt('123123123'),
                'gender' => 'male',
                'address' => 'address user'.$i,
                'dob' => Carbon::create('1212','12','12'),
                'profilePicture' => 'ppR2.png',
                'role' => 'member'
            ]);
        }
    }
}
