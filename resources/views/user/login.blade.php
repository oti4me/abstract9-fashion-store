@extends('layouts.public')
@push('styles')
    <link href="{{ asset('/js/fashion/jquery.js') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/js/fashion/bootstrap.min.js') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/js/fashion/jquery.prettyPhoto.js') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/js/fashion/main.js') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <div class="container">
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            <form action="{{ route('user.login') }}" method="post">
                                @csrf
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" />
                                <input type="password" placeholder="Password" name="password"/>
                                <span>
								    <input type="checkbox" class="checkbox" name="remember">
								    Keep me signed in
							    </span>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                            @if($message = Session::get('login-error'))
                                <br><span class="text-danger">* {{ $message }}</span>
                            @endif

                            @if($errors)
                                @foreach($errors->all() as $error)
                                    <br><span class="text-danger">* {{ $error }}</span>
                                @endforeach
                            @endif
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>New User Signup!</h2>
                            <form action="{{ route('user.signup') }}", method="post">
                                @csrf
                                <input type="text" placeholder="First Name" name="first_name" value="{{ old('first_name') }}"/>
                                <input type="text" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" />
                                <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" />
                                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}" />
                                <span>
								    <input type="checkbox" class="checkbox" name="is_vendor">
								    I am a vendor
							    </span>
                                <button type="submit" class="btn btn-default">Signup</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
    </div>
@endsection
