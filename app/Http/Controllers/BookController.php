<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //create data start
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'book_name' => 'required',
                'author' => 'required',
                'desc' => 'required'
            ]
        );

        if($validator -> fails()) {
            return Response() -> json($validator->errors());
        }

        $store = Book::create([
            'book_name' =>$request->book_name,
            'author' => $request->author,
            'desc' => $request->desc
        ]);

        $data = Book::where('book_name', '=', $request->book_name)-> get();
        if($store){
            return Response() -> json([
                'status' => 1,
                'message' => 'Succes create new data!',
                'data' => $data
            ]);
        } else 
        {
            return Response() -> json([
                'status' => 0,
                'message' => 'Failed create data!'
            ]);
        }
    }
    //create data end
}
