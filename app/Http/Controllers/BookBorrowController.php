<?php

namespace App\Http\Controllers;

use App\BookBorrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Suport\FFacades\DB;

class BookBorrowController extends Controller
{
    //create data start 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'date_of_borrowing' => 'required',
            'ddate_of_returning'  => 'required'
        ]);

        if($validator->fails()){
            return Response() -> json($validator->errors());
        }

        $store = BookBorrow::create([
            'student_id' => $request->student_id,
            'date_of_borrowing' => $request->date_of_borrowing,
            'date_of_returning' => $request->date_of_returning
        ]);

        $data = BookBorrow::where('student_id', '=', $request->student_id);
        if($store){
            return Response() -> json([
                'status' => 1,
                'message' => 'Succes create new data!',
                'data' => $data
            ]);
        }else
        {
            return Response() -> json([
                'status' => 0,
                'message' => 'Failed create new data!'
            ]);
        }
    }
    //create data end
}
