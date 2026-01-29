<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Carosel;

class Category extends Model
{
           use HasFactory; 

    protected $fillable = [
        
        'category_name',
        'category_description',
        'category_slug',
        'category_img',
        'updated_at',
        'created_at'
    ];
    public function carosel(){
        return $this->hasmany(Carosel::class);
    }
}
