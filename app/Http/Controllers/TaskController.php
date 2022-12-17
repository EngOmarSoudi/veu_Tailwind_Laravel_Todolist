<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
//    public function __construct()
//    {
////        $this->middleware('auth');
////        $this->middleware('auth:api');
////        $this->middleware('verified');
//    }
    public function Index1()
    {
//        dd('function');
        $tasks = Task::orderBy('created_at', 'DESC')->get();
        return response()->json(['Tasks' => $tasks]);

    //    return inertia()->render('myvue/my');
    //    return Inertia::render('myvue/my');
//       ,[
//       'title' => $name,
//       "idp"=> $id,
//   ]
    }
    public function Index()
    {
//        dd('function');
        $tasks = Task::orderBy('created_at', 'DESC')->get();
        // return response()->json(['Tasks' => $tasks]);

       return inertia()->render('myvue/my');
    //    return Inertia::render('myvue/my');
//       ,[
//       'title' => $name,
//       "idp"=> $id,
//   ]
    }
    public function store(Request $request)
    {
//        dd($request->all());
//        $id=Auth::user()->id;
        $store = Task::create([
//            return $request;
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'completed' => $request->get('completed'),
            'details' => $request->get('details'),
            'completed_at' => $request->get('completed_at'),
            "user_id" => $request->user()->id,
        ]);
        if ($store) {
            return response()->json([
                'status' => true,
                'msg' => __('massages.added successfully'),
                'title' => $request->get('title'),
                'date' => $request->get('date'),
                'time' => $request->get('time'),
                'completed' => $request->get('completed'),
                'details' => $request->get('details'),
                'completed_at' => $request->get('completed_at'),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => __('massages.The offer is not exist'),
                'title' => $request->get('title'),
                'date' => $request->get('date'),
                'time' => $request->get('time'),
                'completed' => $request->get('completed'),
                'details' => $request->get('details'),
                'completed_at' => $request->get('completed_at'),
            ]);
        }

    }
    public function update(Request $request, $id)
    {
    //    dd($request);
       $exist=Task::find($id);
       if($exist){
            $exist->update(
                [
                    'title' => $request->get('title'),
                    'date' => $request->get('date'),
                    'time' => $request->get('time'),
                    'completed' => $request->get('completed'),
                    'details' => $request->get('details'),
                    'completed_at' => $request->get('completed_at'),
                ]
            );


        return response()->json(['Tasks' => $exist]);
       }
       return "item not found";
    }
    public function delete($id){
        $task=Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json([
                'status' => true,
                'msg' => __('massages.The offer is deleted successfully'),
            ]);
        }
        return response()->json([
            'status' => false,
            'msg' => __('massages.The Task is not exist'),
        ]);
    }
}