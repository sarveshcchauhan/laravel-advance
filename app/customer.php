<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $guarded=[];
    public function format_from_model(){
        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'created_by' => $this->user->email,
            'last_updated' => $this->updated_at->diffForHumans()
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
