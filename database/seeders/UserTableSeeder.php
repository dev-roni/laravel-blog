<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::insert([
             [ 
            'name' => 'boss',
            'email' => 'boss@gmail.com',
            'phone' => '01111111111',
            'user_role' => '1',
            'password'=> hash::make('11111111')
             ],
             [ 
            'name' => 'boss2',
            'email' => 'boss2@gmail.com',
            'phone' => '01111111112',
            'user_role' => '2',
            'password'=> hash::make('11111111')
             ],
             [ 
            'name' => 'boss3',
            'email' => 'boss3@gmail.com',
            'phone' => '01111111113',
            'user_role' => '3',
            'password'=> hash::make('11111111')
            ]
        ]);
    }
}
