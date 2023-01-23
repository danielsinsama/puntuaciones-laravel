@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Editar tarea</h1>
    <form method="POST" action="{{url('tasks'.'/'.$task->id)}}">
        {!! csrf_field() !!}
        @method('patch')

            <input  class="form-control" placeholder="Nombre"  type="text" name="name" value="{{$task->name}}"/>
            <br/>
            <input  class="form-control" placeholder="Score"  type="number"  name="score" value="{{$task->score}}"/>
            <br/>
            <input  class="form-control" placeholder="Descripcion"  type="text" name="description"  value="{{$task->description}}"/>
            <br/>
        <input  class="btn btn-dark" type="submit" value="Editar"/>
    </form>
    </div>
</div>
@endsection
