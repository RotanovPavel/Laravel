@extends('layouts.app')
{{-- include in layouts/app --}}
@section('content')


    <div class="container panel-box">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Hello {{Auth::user()->username}}! You are logged in!
                    </div>
                    <div class="panel-body">
                        <a class="btn btn-info" href="{{ route('users.show', ['id' => Auth::user()->id ])}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
