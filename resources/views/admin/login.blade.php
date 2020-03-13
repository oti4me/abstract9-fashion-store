<h1>Admin Login</h1>
<form method="post" action="{{ route('admin.login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
    <input type="submit" value="Login">
    @if($message = Session::get('admin-login-error'))
        <br><span class="text-danger">* {{ $message }}</span>
    @endif

    @if($errors)
        @foreach($errors->all() as $error)
            <br><span class="text-danger">* {{ $error }}</span>
        @endforeach
    @endif
</form>
