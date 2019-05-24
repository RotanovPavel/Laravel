@extends('layouts.app')
@section('content')
    <div class="container panel-box">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-striped">
                        <tr>
                            <td class="info">Name:</td>
                            <td class="info">Email:</td>
                            <td class="info">Username:</td>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->username}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

