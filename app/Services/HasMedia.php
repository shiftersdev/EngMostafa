<?php
namespace App\Services;

class HasMedia {

    //fuction to upload image in public->images->$path
    public static function upload($image,$path)
    {
        $imageName = $image->hashName();
        $image->move($path,$imageName);
        return $imageName;
    }

    //fuction to delete image from public->images->$path if exist
    public static function delete($path)
    {
        if(file_exists($path)){
            unlink($path);
            return true;
        }
        return false;
    }
}


