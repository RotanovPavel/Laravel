@extends('layouts.app')

@section('content')
@include('admin/panel')
    <div class="container panel-box">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Brand</div>
                    <div class="panel-body">

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form method="post" action="{{route('brands.update',['id' => $brand->id])}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="img-edit">
                                <img alt="{{$brand->name}}" src="{{ asset('img/brands/'.$brand->image) }}"
                                     >
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $brand->name }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="image">
                                </div>

                            </div>

                            <button class="btn btn-default" type="submit">Change</button>
                            <a class="btn btn-info" href="{{url('brands')}}">Brands</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

