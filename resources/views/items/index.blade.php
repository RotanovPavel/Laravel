@extends('layouts.app')

@section('content')
    @include('admin/panel')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a class="btn btn-info" href="{{ route('items.create')}}">Add Item</a>
            </div>
        </div>
    </div>

    <div class="container panel-box">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-striped">
                        <tr>
                            <td class="info">Name:</td>
                            <td class="info">Image:</td>
                            <td class="info">Relevance:</td>
                            <td class="info">Price:</td>
                            <td class="info">ID:</td>
                            <td class="info"></td>
                            <td class="info"></td>
                        </tr>
                        @foreach($query as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->image}}</td>
                                <td>{{$item->relevance}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->id}}</td>
                                <td>
                                    <a class="btn btn-info"
                                       href="{{ route('items.edit', ['id' => $item->id ])}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('items.destroy', ['id' => $item->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
