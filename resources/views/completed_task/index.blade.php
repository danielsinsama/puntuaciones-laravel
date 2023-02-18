@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(session('msjCompletedTask'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('msjCompletedTask')}}</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    <form action="{{url('score-points')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Task:</label>
            <input type="number" class="form-control" name="taskId" >
        </div>
    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
    </form>
    <table class="table mt-4" >
        <thead class="table-secondary">
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
                    Puntos
                </th>
                <th class="text-center">   
                    Cantidad
                </th>
                <th class="text-center">   
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
            @if (!Cart::isEmpty())
                @foreach (Cart::getContent() as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->attributes['description']}}</td>
                        <td class="text-center" >{{$item->price}}</td>
                        <td class="text-center" >{{$item->quantity}}</td>
                        <td class="text-center" >
                            <form action="{{url('score-points'.'/'.$item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection

