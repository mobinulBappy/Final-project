<?php

namespace App\Traits;

trait slugGenerator
{
    function slugBuild($modelName,$slug){
        $count = $modelName::where('slug','LIKE','%'.$slug.'%')->count();
        if($count > 0){
            $count = $count + 1;
            $newSlug = $slug .'-'. $count;
        }else{
            $newSlug = $slug;
        }
        return $newSlug;
    }
}
