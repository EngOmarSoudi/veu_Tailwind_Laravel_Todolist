<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
//        $this->middleware('auth:api');
//        $this->middleware('verified');
   }
//     public function Index1()
//     {
// //        dd('function');
//         $tasks = Task::orderBy('created_at', 'DESC')->get();
//         return response()->json(['loginUsers' => $tasks]);

//     //    return inertia()->render('myvue/my');
//     //    return Inertia::render('myvue/my');
// //       ,[
// //       'title' => $name,
// //       "idp"=> $id,
// //   ]
//     }
    public function getTasks(){
        return response()->json([Task::latest()->get()]);
    }
    public function Index()
    {
//
        $tasks = Task::orderBy('created_at', 'DESC')->get();
        // return response()->json(['loginUsers' => $tasks]);
// dd($tasks);
       return inertia()->render('myvue/my',["tasks"=>$tasks]);
    //    return Inertia::render('myvue/my');
//       ,[
//       'title' => $name,
//       "idp"=> $id,
//   ]
    }
    public function store(Request $request)
    {
    //    dd($request->get("title"));
       $id=Auth::user()->id;
        $store = Task::create([
//            return $request;
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'completed' => $request->get('completed'),
            'details' => $request->get('details'),
            'completed_at' => $request->get('completed_at'),
            "user_id" => $id,
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


        return response()->json(['loginUsers' => $exist]);
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