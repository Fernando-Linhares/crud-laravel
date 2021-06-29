@extends('layout.app')

@section('content')
    <div class="container">
        <div  class="card card-sm card-border">
            <form class="form-group" action="{{route('store')}}">
                @csrf
                <input class="form-control" type="text" name="name">
                <input class="form-control" type="text" name="price">
                <input class="btn btn-primary" type="submit" name="name">
            </form>
        </div>
    </div>
@endsection