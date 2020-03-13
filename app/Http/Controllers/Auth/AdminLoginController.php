<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show login form form
     *
     * @param Request $request
     * @return Factory|View
     */
    public function loginForm(Request $request)
    {
        return view('admin.login');
    }

    /**
     * Logs in an admin into the application
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        ['email' => $email, 'password' => $password] = $request->only('email', 'password');

        $admin = AdminRepository::getByEmail($email);

        if (!$admin || !Hash::check($password, $admin->password))
            return back()->with('admin-login-error', 'Email or Password incorrect');

        auth('admin')->login($admin);

        return redirect()->intended(route("admin.dashboard"));
    }

    /**
     * Logs out an admin from the application
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request)
    {
        session()->flush();

        auth('admin')->logout();

        return redirect()->route('admin.login.show');
    }
}
