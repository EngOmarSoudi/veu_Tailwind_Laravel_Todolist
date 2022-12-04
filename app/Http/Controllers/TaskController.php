<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store (Request $request){
//        dd($request->all());
        return response()->json([
//            return $request;
            'title'=>$request->get('title'),
            'date'=>$request->get('date'),
            'time'=>$request->get('time'),
            'completed'=>$request->get('completed'),
            'details'=>$request->get('details'),
            'completed_at'=>$request->get('completed_at'),

        ]);
    }
}
