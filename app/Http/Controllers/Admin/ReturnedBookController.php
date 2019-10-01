<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class ReturnedBookController extends ResourceController
{
    /**
    * Prepare data before submit
    * 
    * @param  \Illuminate\Http\Request  $request
    */
   protected function prepareStoreData(Request $request, int $id = null){
       $user = request()->user();
       $time = Carbon::now();
       $data = parent::prepareStoreData($request,$id);
       $data->user_id = $user->id;
       $data->time = $time->toDateTimeString();
       $data->name = $user->id . $data->member_id .$time->timestamp;
       return $data;
   }

   protected function afterStoreData($data){
       
   }
}
