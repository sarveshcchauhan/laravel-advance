<?php


namespace App\Mixins;


class StrMixins
{
    public function partNumber(){
        return function($part){
            return 'USA MOBILE FORMAT  '.'+555 '.substr($part,0,4).'-'.substr($part,4,4).'-'.substr($part,8,10);
        };
    }

    public function prefix(){
        return function ($string,$prefix){
          return $prefix."_".$string;
        };
    }
}
