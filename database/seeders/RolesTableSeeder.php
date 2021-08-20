<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::query()->find(1) || Role::query()->find(2)) {
            return;
        }
        $roles = [
            ['title' => 'Administrator'],
            ['title' => 'Staff'],
        ];
        Role::insert($roles);
    }
}
