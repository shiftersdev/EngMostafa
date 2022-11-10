<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'image' ];

    protected function image(): Attribute
    {
        //for returning the required image to the view
        return Attribute::make(
            get: function($value){
                return asset('images/posts/'.$value);
            },
        );
    }

}
