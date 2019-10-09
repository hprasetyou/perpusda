<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    function author(){
        return $this->belongsTo('App\Author');
    }
    function category(){
        return $this->belongsTo('App\Category','categories_id');
    }
    function publisher(){
        return $this->belongsTo('App\Publisher');
    }
}
