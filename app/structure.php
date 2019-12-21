<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class structure extends Model
{
    public static function allStructure()
    {
        return $structures = app(Pipeline::class)
            ->send(structure::query())
            ->through([\App\QueryFilter\Active::class,\App\QueryFilter\Sort::class,\App\QueryFilter\MaxCount::class])
            ->thenReturn()->paginate();
    }
}
