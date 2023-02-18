<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Classes\TasksSession;
use App\Models\Task;

use Illuminate\Http\Request;

class CompletedTasksController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // https://visioncodigo.com/blog/como-crear-un-carrito-de-compras-en-php-laravel
        return view('completed_task.index');
    }

    public function add(Request $request){
        $userId = Auth::user()->id;
        $datos = $request->all();
        $id = $datos['taskId'];
        $task = Task::find($id);
        if($task != null && $task->userId == $userId ){
            session(['msjCompletedTask'=>'Tarea agregada']);
            \Cart::add(array(
                'id' => $task->id,
                // 'description' => $task->description,
                'name' => $task->name,
                'price' => $task->score,
                'quantity' => 1,
                'attributes' => array(
                    'description' => $task->description
                )
            ));
            // return session('msjCompletedTask');
        }
        else{
            session(['msjCompletedTask'=>'Tarea no ubicada']);
            // return session('msjCompletedTask');
        }
        return redirect('score-points');
    }
    public function  remove($id){
        // return $id;
        \Cart::remove($id);
        return redirect('score-points');
    }
}
