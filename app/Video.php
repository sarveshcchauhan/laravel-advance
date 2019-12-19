<?php

namespace App;

use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function comment(){
        return $this->morphMany(comments::class,'commentable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
