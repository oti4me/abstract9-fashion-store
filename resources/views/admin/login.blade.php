@extends('layouts.admin')
@section('content')
    <style>
        .center {
            width: 50%;
            top: 10%;
        }
    </style>
    <div class="row">
        <main role="main" class="col-md-8 offset-md-4 pt-5 mt-5">
            <h4>ADMIN LOGIN</h4>
            <form method="post" action="{{ route('admin.login') }}" class="center">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"
                           value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                           value="{{ old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                @if($message = Session::get('admin-login-error'))
                    <br><span class="text-danger">* {{ $message }}</span>
                @endif
                @if($errors)
                    @foreach($errors->all() as $error)
                        <br><span class="text-danger">* {{ $error }}</span>
                    @endforeach
                @endif
            </form>
        </main>
    </div>
@endsection

