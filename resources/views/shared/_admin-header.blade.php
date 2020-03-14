<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ auth()->guard('admin')->check() ? route('admin.logout') : route('user.logout') }}">
                @if(auth()->guard('admin')->check() || auth()->guard()->check())
                    Sign out
                @else
                    Sign In
                @endif
            </a>
        </li>
    </ul>
</nav>
