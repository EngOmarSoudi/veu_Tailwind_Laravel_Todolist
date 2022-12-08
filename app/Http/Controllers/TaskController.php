<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Kernel;

class TaskController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
//        $this->middleware('verified');
    }
    public function Index(){
        $tasks=Task::orderBy('created_at','DESC')->get();
        return inertia()->render('myvue/my',['status'=>true,"tasks"=>$tasks]);
//        return Inertia::render('myvue/my');
//       ,[
//       'title' => $name,
//       "idp"=> $id,
//   ]
    }
    public function store (Request $request){
//        dd($request->all());
        $id=Auth::user()->id;
        $store=Task::create([
//            return $request;
            'title'=>$request->get('title'),
            'date'=>$request->get('date'),
            'time'=>$request->get('time'),
            'completed'=>$request->get('completed'),
            'details'=>$request->get('details'),
            'completed_at'=>$request->get('completed_at'),
            "user_id"=> $id,
        ]);
        if ($store)
            return response()->json([
                'status'=>true,
                'msg'=>__('massages.added successfully'),
                'title'=>$request->get('title'),
                'date'=>$request->get('date'),
                'time'=>$request->get('time'),
                'completed'=>$request->get('completed'),
                'details'=>$request->get('details'),
                'completed_at'=>$request->get('completed_at'),
            ]) ;
        else
            return response()->json([
                'status'=>false,
                'msg'=>__('massages.The offer is not exist'),
                'title'=>$request->get('title'),
                'date'=>$request->get('date'),
                'time'=>$request->get('time'),
                'completed'=>$request->get('completed'),
                'details'=>$request->get('details'),
                'completed_at'=>$request->get('completed_at'),
            ]) ;
    }
}
