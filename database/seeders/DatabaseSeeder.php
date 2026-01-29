<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run():void
    {   
        Post::factory()->count(100)->create();
        User::factory()->count(1)->create();
        $this->call([
            CategorySeeder::class,
            UserRoleTableSeeder::class,
            SettingTableSeeder::class,
            UserTableSeeder::class,
            CaroselSeeder::class
        ]);
    }
}
