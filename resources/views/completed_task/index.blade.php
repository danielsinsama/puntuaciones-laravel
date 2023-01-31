@extends('layouts.app')

@section('content')
<div class="container">
    
    <form action="{{url('score-points')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Task:</label>
            <input type="" class="form-control" name="taskId">
        </div>
    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
    </form>

</div>
@endsection

