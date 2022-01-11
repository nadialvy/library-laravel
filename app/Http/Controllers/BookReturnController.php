<?php

namespace App\Http\Controllers;

use App\BookReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BookReturnController extends Controller
{
    //create data start
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'book_borrow_id' => 'required',
            'date_of_returning' => 'required',
            'fine' => 'required'
        ]);

        if($validator->fails()){
            return Response() -> json($validator->errors());
        }

        $store = BookReturn::create([
            'book_borrow_id' => $request->book_borrow_id,
            'date_of_returning' => $request->date_of_returning,
            'fine' => $request->fine
        ]);
        
        $data = BookReturn::where('book_borrow_id', '=', $request->book_borrow_id)->get();
        if($store){
            return Response() -> json([
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
