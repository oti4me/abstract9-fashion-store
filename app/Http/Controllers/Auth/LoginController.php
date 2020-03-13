<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show login form form
     *
     * @param Request $request
     * @return Factory|View
     */
    public function loginForm(Request $request)
    {
        return view('user.login');
    }

    /**
     * Logs a user into the application
     *
     * @param LoginFormRequest $request
     * @return RedirectResponse
     */
    public function login(LoginFormRequest $request)
    {
        ['email' => $email, 'password' => $password] = $request->only('email', 'password');

        $user = UserRepository::getUserByEmail($email);

        if (!$user || !Hash::check($password, $user->password))
            return back()->with('login-error', 'Email or Password incorrect');

        auth()->login($user);

        $userType = strtolower($user->getType());

        return redirect()->intended(route("$userType.profile"));
    }

    /**
     * Logs a user out of the application
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        session()->flush();

        auth()->logout();

        return redirect()->route('home');
    }
}
