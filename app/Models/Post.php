<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Postcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Post extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Postcategory::class);
    }

    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->post_content));
        $minutes = ceil($wordCount / 200);

        return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' read';
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBySession()
    {
        return $this->likes()->where('session_id', Session::getId())->exists();
    }
}
