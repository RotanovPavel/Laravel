@extends('layouts.app')

@section('content')
    <?php $users = DB::table('users')->get(); ?>
    <div class="container panel-box">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading btn-primary ">WELCOME TO ADMIN PANEL</div>
                </div>
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
                            <td class="info">Email:</td>
                            <td class="info">Username:</td>
                            <td></td>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('users.edit', ['id' => $user->id ])}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('users.destroy', ['id' => $user->id]) }}">
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
