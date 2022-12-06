<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('verified');
    }
    public function index(){
        return inertia()->render('myvue/my'
//       ,[
//       'title' => $name,
//       "idp"=> $id,
//   ]
        );
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
