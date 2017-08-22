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
        $users = [
            [
                'name' => 'Admin',
                'email' => 'gianhuan1211@gmail.com',
                'password' => '123456',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
