@extends('layouts.app')

@section('content')
    <div class="container panel-box">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                    <div class="panel-body">

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form method="post" action="{{route('users.update',['id' => $user->id])}}">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $user->name }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ $user->username }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" value="{{ $user->email }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="{{ $user->password }}"/>
                                    </div>
                                </div>

                                <div class=" form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Confirm</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation"/>
                                    </div>
                                </div>

                                <button class="btn btn-default" type="submit">Send</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

