<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Carosel extends Model
{
    protected $fillable = [
        'categories_id',
        'carosel_select',
    ];
    public function category():Belongsto
    {
        return $this->belongsto(Category::class, 'categories_id');
    }
}
