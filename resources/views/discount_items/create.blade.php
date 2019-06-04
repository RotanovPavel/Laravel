@extends('layouts.app')

@section('content')
    @include('admin/panel')
    <div class="container panel-box">
        <div class="row ">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ __('Add Discount Item') }}</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('discount_items.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"  placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="price"  placeholder="$0.00">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="image">
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-default">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
