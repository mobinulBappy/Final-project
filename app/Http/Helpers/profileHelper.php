<?php

if(!function_exists('getprofileImage')){
    function getprofileImage($guard='web'){
        if(auth($guard)->user()?->profile){
            return auth()->user()->profile;
        }else{
            return 'https://api.dicebear.com/9.x/initials/svg?seed='.auth($guard)?->user()?->name.'&backgroundColor=696cff';
        }
    }
}