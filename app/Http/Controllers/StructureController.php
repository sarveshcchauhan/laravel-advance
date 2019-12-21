<?php

namespace App\Http\Controllers;

use App\structure;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class StructureController extends Controller
{
    public function index(){
        //basic
//        $structures = structure::query();
//        if(request()->has('active')){
//            $structures->where('active',request('active'));
//        }
//        if(request()->has('sort')){
//            $structures->orderBy('title',request('sort'));
//        }
//        $structures = $structures->get();
//        return view('structure.index',compact('structures'));

            //using Pipeline
        $structures = structure::allStructure();

        return view('structure.index',compact('structures'));

    }
}
