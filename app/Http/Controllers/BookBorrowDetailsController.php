<?php

namespace App\Http\Controllers;

use App\BookBorrowDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BookBorrowDetailsController extends Controller
{
    //create data start
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'book_borrow_id' => 'required',
            'book_id' => 'required',
            'qty' => 'required'
        ]);

        if($validator->fails()){
            return Response() -> json($validator->errors());
        }

        $store = BookBorrowDetails::create([
            'book_borrow_id' => $request->book_borrow_id,
            'book_id' => $request->book_id,
            'qty' => $request->qty
        ]);

        $data = BookBorrowDetails::where('book_borrow_id', '=', $request->book_borrow_id)->get();
        if($store){ 
            return Response()->json([
                'status' => 1,
                'message' => 'Succes create new data!',
                'data' => $data
            ]);
        }else {
            return Response() -> json([
                'status' => 0,
                'message' => 'Failed create new data!'
            ]);
        }
    }
    //create data end
}
