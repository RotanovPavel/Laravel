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

                        <form method="post" action="{{route('items.update',['id' => $item->id])}}">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    {{ $item->name }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    {{ $item->price }}$
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Relevance</label>
                                <div class="col-sm-10">
                                    {{ $item->relevance }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    {{ $item->image }}
                                </div>
                            </div>
                        </form>
                        <a class="btn btn-default" href="{{url('items')}}">Items</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

