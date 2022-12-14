<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index(){
        return response()->json(['status' =>true]);
//        $tasks=Task::orderBy('created_at','DESC')->get();
//        return inertia()->render('myvue/my');
    }

}
