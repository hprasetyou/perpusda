<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BorrowedBookController extends ResourceController
{    
    private $borrow_interval_days = 5;
    /**
    * Prepare data before submit
    * 
    * @param  \Illuminate\Http\Request  $request
    */
   protected function prepareStoreData(Request $request, int $id = null){
       $user = request()->user();
       $time = Carbon::now();
       $data = parent::prepareStoreData($request,$id);
       if(!$id){
           $data->user_id = $user->id;
           $data->time = $time->toDateTimeString();
           $data->name = $user->id . $data->member_id .$time->timestamp;
           $data->due_date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $this->borrow_interval_days, date('Y')));
       }else{
            $obj = $this->model::findOrFail($id);
            if($data->status == 'returned' && $obj->status == 'borrowed'){
                $data->returned = $time->toDateTimeString();
            }
       }
       return $data;
   }
   protected function prepareData(Request $request){
       $data = $this->model::with(['book','member']);
       return $data;
   }

   protected function filterData(Request  $request, $data){
    $data = parent::filterData($request, $data);
    $columns = ['book','member'];
    $filter = $request->query('filter');
    $filterValue = $request->query('filterValue');
    $filterOperator = $request->query('filterOperator');
    if($request->query('filter')){
        foreach ($filter as $key => $col) {
            if(in_array($col,$columns)){
                $q = $filterValue[$key];
                $operator = $filterOperator[$key];
                if($operator == 'like'){
                    $q = '%'. $q .'%';
                }
                $data = $data->whereHas($col, function ($query) use ($operator, $q){
                    $query->where('name', $operator, $q);
                });
            }
        }
    }
    return $data;
}


}
