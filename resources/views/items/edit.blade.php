@extends('layouts.app')

@section('content')
@include('admin/panel')
    <div class="container panel-box">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Item</div>
                    <div class="panel-body">

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form method="post" action="{{route('items.update',['id' => $item->id])}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="img-edit">
                                <img alt="{{$item->name}}" src="{{ asset('img/items/'.$item->image) }}">
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $item->name }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" value="{{ $item->price }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-2 col-form-label">{{ __('Relevance') }}</label>

                                <div class="radio">
                                    <div class="col-md-6">

                                        <label><input type="radio" name="relevance" checked
                                                      value="featured">Featured</label>

                                        <label><input type="radio"  name="relevance"
                                                      value="latest">Latest</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="image">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-2 col-form-label">{{ __('Brands') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="brand_id">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <button class="btn btn-default" type="submit">Change</button>
                            <a class="btn btn-info" href="{{url('items')}}">Items</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

