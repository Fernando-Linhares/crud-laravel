@extends('layout.app')

@section('content')
    <div style="height: 30%; width: 45%; padding-top: 10%;" class="container">
        <div  class="card card-border w-100" style="padding: 20px;">
            <form class="form-group" method="post" action="{{route('store')}}">
                @csrf
                <input class="form-control" type="text" name="name">
                <br>
                <input class="form-control" type="text" name="price">
                <br>
                <select name="category_id" >
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <br>
                <input class="btn btn-primary" type="submit" value="enviar">
            </form>
        </div>
    </div>
@endsection