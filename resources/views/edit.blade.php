@extends('layout.app')

@section('content')
<div style="height: 30%; width: 45%; padding-top: 10%;" class="container">
    <div class="card card-border" style="padding: 20px;">
        <form class="form-group" method="post" action="{{route('update',['id'=>$product->id])}}">
            @csrf
            @method('PUT')
            <div>
                <input class="form-control" type="text" name="name" value="{{$product->name}}">
            </div>
            <br>
            <div>
                <input class="form-control" type="text" name="price" value="{{$product->price}}">
            </div>
            <div>
                <select name="category_id" >
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="enviar">
            </div>
        </form>
    </div>
</div>
@endsection