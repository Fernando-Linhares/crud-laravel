@extends('layout.app')
@section('content')
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>name</td>
                <td>price</td>
                <td>mark</td>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</div>
@endsection