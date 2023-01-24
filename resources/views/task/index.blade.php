@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center">
    <h1 class="h1 mt-3 mb-4">
        Listado de  tareas
    </h1>

    <p class=""><a class="btn btn-success" href="{{url('tasks'.'/'.'create')}}">Nueva tarea</a></p>
    </div>


    <div class="row justify-content-center">
        <table class="table table-bordered">
        <!-- Fila   : table row -->
        <thead class="table-info">
            <tr>
                <!-- table data -->
                <th>   
                    Id
                </th>
                <th>   
                    Nombre
                </th>
                <th>   
                    Descripcion
                </th>
                <th class="text-center">   
                    Score
                </th>
                <th class="text-center">   
                    Editar
                </th>
                <th class="text-center">   
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->description}}</td>
                    <td class="text-center">{{$task->score}}</td>
                    <td class="text-center"><a  href="{{url('tasks'.'/'.$task->id.'/'.'edit')}}" class="btn btn-dark">Editar</a></td>
                    <td class="text-center">   
                        <form method="POST" action="{{url('tasks'.'/'.$task->id)}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

