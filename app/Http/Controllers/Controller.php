<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

 class Controller
{
    function sample_bossing(){
     
            $model = User::all();
        
             if(!$model){
                return response()->json(['error' => 'error pa!' ], 404);   
             }
          
             return view('sample', compact('model'));
       
    }

    function insert_bossing(Request $request){
        try{
            $model = User::class;
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            if($validator->fails()){
                return response()->json($validator->messages(),422);
            }

            $model::create([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);
    
            return response()->json(['message' => 'successfully created!'], 201);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
      
    }
}
