<?php

use App\Models\User;
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
        $users = [
            [
                'name' => 'User1',
                'email' => 'user@gmail.com',
                'is_admin' => false,
                'password' => bcrypt('user123'),
                'gender' => '1',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'is_admin' => true,
                'password' => bcrypt('admin123'),
                'gender' => '1',
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
