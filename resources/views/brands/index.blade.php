@extends('layouts.app')

@section('content')
    @include('admin/panel')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
            </div>
        </div>
    </div>


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
                                <td><img alt="{{asset('img/brands/small_brands/'.$brand->image)}}"
                                         src="{{ asset('img/brands/small_brands/'.$brand->image) }}"
                                         class="img-responsive">
                                </td>
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
