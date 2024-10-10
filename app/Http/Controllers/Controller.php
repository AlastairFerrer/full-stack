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
                return response()->json(['error' => 'error pa!' ], 500);   
             }
          
             return view('sample', compact('model'));
       
    }

    function insert_bossing(Request $request){
        
        User::create([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return response()->json(['message' => 'successfully created!'], 201);
    }
}
