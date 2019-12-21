<?php


namespace App\QueryFilter;


class MaxCount extends Filter
{


    protected function applyFilter($builder)
    {
        return $builder->take(request($this->filterClassName()));
    }
}
