@extends('layouts.app')

@section('content')
    @include('admin/panel')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a class="btn btn-info" href="{{ route('discount_items.create')}}">Add Item</a>
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
                            <td class="info">Relevance:</td>
                            <td class="info">Price:</td>
                            <td class="info">Brand:</td>
                            <td class="info">Image:</td>
                            <td class="info"></td>
                            <td class="info"></td>
                        </tr>
                        @foreach($discount_items as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <img alt="{{$item->name}}" src="{{ asset('img/discount_items/small_discount_items/'.$item->image) }}">
                                </td>
                                <td>
                                    <a class="btn btn-info"
                                       href="{{ route('discount_items.edit', ['id' => $item->id ])}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('discount_items.destroy', ['id' => $item->id]) }}">
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
