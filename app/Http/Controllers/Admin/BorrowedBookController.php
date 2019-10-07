<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use PDF;

class BorrowedBookController extends ResourceController
{    
    private $borrow_interval_days = 5;
    protected $with = ['book','member'];
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
   
   public function getBorrowedReport(Request $request){
        //    $data = $this->prepareData($request);
           // Fetch all customers from database
        $data = [];
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf.borrowed_books.borrowed', $data);
        // Finally, you can download the file using download function
        return $pdf->download('borrowed-books.pdf');
   }

}
