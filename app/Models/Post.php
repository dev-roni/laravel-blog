<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
        use HasFactory; 

    protected $fillable = [
        'post_category',
        'post_title',
        'post_img',
        'post_content',
        'post_status',
        'author',
        'slug',
        'clicked'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }
    public function comments(): HasMany
    {
        return $this->hasmany(Comment::class);
    }
}
