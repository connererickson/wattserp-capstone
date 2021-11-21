@extends('layouts.auth')

@section('content')
<div class="container">
    <br>
    <div class="bg-primary text-light text-center">
        Login
    </div>
    <form class="bg-light" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="mb-3 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required autofocus>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('password.request') }}"><button type="button" class="btn btn-danger">Forgot your Password?</button></a>
    </form>
</div>
<!--Old Login Form-->
{{-- <div class="container">
    <div class="row" id='login_form'>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" id='login_form_container'>
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
