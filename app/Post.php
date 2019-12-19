<?php

namespace App;

use App\Tag;
use App\Image;
use App\comments;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function comment(){
        return $this->morphMany(comments::class,'commentable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
