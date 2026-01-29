<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Setting::insert([
             [ 
            'site_title' => 'Euphoria',
            'site_slug' => 'my-blog',
            'site_description' => 'ekhane sokol dhoroner blog paben',
            'site_logo_url' => 'assets/img/feature-1.jpg',
            'favicon_url' => 'assets/img/feature-1.jpg',
            'facebook_url' => 'facebook.com/sinhasreyan',
            'x_url' => 'x.com/idnai',
            'insta_url' => 'instagram.com/poredimu',
            'linkedin_url' => 'linkedin.com/ekhonnai',
            'youtube_url' => 'youtube.com/channelnai'
            ]
        ]);
    }
}
