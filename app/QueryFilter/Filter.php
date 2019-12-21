<?php


namespace App\QueryFilter;


use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request, \Closure $next){
        if(!request()->has($this->filterClassName())){
            return $next($request);
        }
        $builder = $next($request);

        return $this->applyFilter($builder);
    }

    protected abstract function applyFilter($builder);

    protected function filterClassName(){
        return Str::snake(class_basename($this));
    }
}
