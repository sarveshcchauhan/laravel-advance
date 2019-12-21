<?php 

namespace app;

class PostCard{

    protected static function resolveFacades($name){
        return app()[$name];
    }

    //If function doent exist inside a class by default __callStatic functin will be called
    
    public static function __callStatic($method,$any_arg){

        return self::resolveFacades('PostCard')->$method(...$any_arg);
    }
}