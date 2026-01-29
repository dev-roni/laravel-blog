<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model

{

    protected $fillable = [
        'site_title',
        'site_slug',
        'site_description',
        'site_logo_url',
        'favicon_url',
        'facebook_url',
        'x_url',
        'insta_url',
        'linkedin_url',
        'youtube_url'
    ];
}
