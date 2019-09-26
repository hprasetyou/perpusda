<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    function book(){
        return $this->belongsTo('App\Book');
    }
    function member(){
        return $this->belongsTo('App\Member');
    }
}
