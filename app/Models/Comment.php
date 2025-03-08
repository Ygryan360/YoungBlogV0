<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'post_id', 'name'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
