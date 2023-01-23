@extends('layouts.app')

@section('content')
<div class="container">
{{Auth::user()->id}}
</div>
@endsection
