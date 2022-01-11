<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    //create data start
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'group' => 'required'
        ]);

        if($validator -> fails()){
            return Response() -> json($validator -> errors());
        }

        // $store = DB::table('grade')
        // ->insert([
        //     'class_name' =>$request->class_name,
        //     'group' => $request->group
        // ]);

        $store = Grade::create([
            'class_name' =>$request->class_name,
            'group' => $request->group
        ]);

        $data = Grade::where('class_name', '=', $request->class_name)->get();
        if($store){
            return Response() -> json([
                'status' => 1,
                'message' => 'Succes create new data!',
                'data' => $data
            ]);
        } else 
        {   
            return Reponse()->json([
                'status' => 0,
                'message' => 'Failed create new data!'
            ]);
        }
    }
    //create data end
}
