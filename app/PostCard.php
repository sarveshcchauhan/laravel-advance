<?php 

namespace app;

class PostCard{

    protected static function resolveFacades($name){
        return app()[$name];
    }

    public static function __callStatic($method,$any_arg){

        return self::resolveFacades('PostCard')->$method(...$any_arg);
    }
}