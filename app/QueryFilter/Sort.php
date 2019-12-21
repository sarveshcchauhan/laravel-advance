<?php


namespace App\QueryFilter;


class Sort extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->orderBy('title',request($this->filterClassName()));
    }
}
