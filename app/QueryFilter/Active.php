<?php


namespace App\QueryFilter;


class Active extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterClassName(),request($this->filterClassName()));
    }
}
