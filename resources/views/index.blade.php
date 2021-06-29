@extends('layout.app')

@section('name')    
<div><a class="btn btn-success" href="{{route('create')}}">add</a></div>
    <div class="container">
        <table class="table table-hover">
            <thead >
                <tr>
                    <td>name</td>
                    <td>price</td>
                    <td>category</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product) 
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a class="btn text-white btn-info" href="{{route('edit', ['id'=>$product->id])}}">edit</a>
                        <form style="display: inline;" action="{{route('destroy',['id'=>$product->id])}}" method="post">
                            <button class="btn btn-danger" type="submit">delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
