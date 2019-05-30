@extends('layouts.app')

@section('content')
@include('admin/panel')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a class="btn btn-info" href="{{ route('brands.create')}}">Add Brand</a>
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
                            <td class="info"></td>
                            <td class="info"></td>
                        </tr>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->image}}</td>
                                <td>
                                    <a class="btn btn-info"
                                       href="{{ route('brands.edit', ['id' => $brand->id ])}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('brands.destroy', ['id' => $brand->id]) }}">
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
