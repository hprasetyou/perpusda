<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowedBookController extends ResourceController
{    /**
    * Prepare data before submit
    * 
    * @param  \Illuminate\Http\Request  $request
    */
   protected function prepareStoreData(Request $request, int $id = null){
       $user = request()->user();
       $time = Carbon\Carbon::now();
       $data->user_id = $user->getId();
       $data->time = $time->toDateTimeString();
       return $data;
   }
}
