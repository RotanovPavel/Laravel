<div class="bottom-block">
    <div class="container">
        <div class="bottom-left-block ">
            @guest
                <h5 class="v-align-m">Welcome visitor you can login or create an account</h5>
            @else
                <h5 class="v-align-m">Hello {{ Auth::user()->username }}, we are glad to see you!</h5>
            @endguest

        </div>


        @guest
            <div class="bottom-center-block ">

                <ul class="v-align-m">
                    <li><a href="#"><i class="fa fa-feed" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                </ul>

            </div>

            <div class="bottom-right-block ">

                <form class="bottom-form v-align-m" method="POST" action="{{ route('login') }}">
                    <p>Sign up:</p>
                    @csrf
                    <div class="form-group ">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror "
                               placeholder="Username" name="username" value="{{ old('username') }}" autofocus>

                        <input id="password" type="password"
                               class="form-control pass @error('password') is-invalid @enderror" placeholder="Password"
                               name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback invalid-box" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-play" aria-hidden="true"></i></button>
                </form>

            </div>
        @endguest
    </div>
    @error('username')
    <div class="container">
        <span class="invalid-feedback invalid-box" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
        @enderror

    </div>
    @error('password')
    <div class="container">
    <span class="invalid-feedback invalid-box" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
