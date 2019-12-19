<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        // $channels = Channel::orderBy('name')->get();
        return view('channel.add');
    }
}
