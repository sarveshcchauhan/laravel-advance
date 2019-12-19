<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $guarded =[];

    public function commentable(){
        return $this->morphTo();
    }
}
