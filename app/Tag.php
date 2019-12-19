<?php

namespace App;

use App\Post;
use App\Video;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded=[];

    public function posts(){
        return $this->morphedByMany(Post::class,'taggable');
    }

    public function videos(){
        return $this->morphedByMany(Video::class,'taggable');
    }
}
