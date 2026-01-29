<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleTableSeeder extends Seeder
{
   
    public function run(): void
    {
        UserRole::insert([
            [ 'role_name' => 'admin'],
            [ 'role_name' => 'editor'],
            [ 'role_name' => 'user']
        ]);
    }
}
