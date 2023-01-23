@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>
            Listado de  tareas
        </h1>

<table class="table">
    <!-- Fila   : table row -->
    <tr>
        <!-- table data -->
        <td>   
            Id
        </td>
        <td>   
            Nombre
        </td>
        <td>   
            Descripcion
        </td>
        <td>   
            Score
        </td>
        <td>   
            Editar
        </td>
        <td>   
            Eliminar
        </td>
    </tr>
    @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->name}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->score}}</td>
            <td><a  href="{{url('tasks'.'/'.$task->id.'/'.'edit')}}" class="btn btn-dark">Editar</a></td>
            <td>   
                <form method="POST" action="{{url('tasks'.'/'.$task->id)}}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
    </div>
</div>
@endsection

