<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskApiController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('created_at', 'DESC')->get();
        return response()->json(['loginUsers' => $tasks]);

    }
    public function store(Request $request)
    {

        $store = Task::create([

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