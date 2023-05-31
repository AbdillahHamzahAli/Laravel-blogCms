<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'content',
        'status',
        'user_id'
    ];
    public function tag()
    {
        return  $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function categories()
    {
        return  $this->belongsToMany(Category::class)->withTimestamps();
    }
}
