<?php

namespace App\Traits\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    function uploadSingleImage($media,$title=null,$dir ='others',$old=null,$disk ='public'){
        if($old){
          Storage::disk($disk)->delete($old);
        }
        if($media){
        $mediaName = ($title ?? uniqid()) .'.'. $media->extension();
        $upload = $media->storeAs($dir,$mediaName,$disk);
        return $upload;
        }else{
            return null;
        }
    }

        function uploadMultiMedia($galleries,$slug,$dir='others'){
        $galleryArrey =[];
        if($galleries){
        foreach($galleries as $gallImage){
          $uniqName = $slug.uniqid();
          $galleryArrey [] = $this->uploadSingleImage($gallImage,$uniqName,$dir);
        }
        }
        return $galleryArrey;
        }

}
