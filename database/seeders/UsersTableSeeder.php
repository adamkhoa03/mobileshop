<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::query()->find(1)) {
            return;
        }
        $user = [
            'name' => 'Minh Khoa',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123@123'),
            'role' => 1,
            'gender' => 1,
            'bio' => 'Handsome and talent',
            'status' => 1
        ];

        User::insert($user);
    }
}
