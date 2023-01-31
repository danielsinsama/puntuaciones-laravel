<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompletedTasksController extends Controller
{
    public function index(){
        return view('completed_task.index');
    }

    public function add(Request $request){
        $tasks = $request->session()->get('tasks');
        if($tasks == NULL){
            session(['tasks' => [$request['taskId']] ]);
        }
        else{
           session(['tasks'=>[...$tasks, $request['taskId']]]);
        }     
        return  session()->get('tasks');
    }
    
}
