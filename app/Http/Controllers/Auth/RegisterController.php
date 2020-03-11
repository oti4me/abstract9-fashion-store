<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Registers a user on the app given a user's credentials.
     *
     * @param SignupRequest $request
     * @return RedirectResponse
     */
    public function register(SignupRequest $request)
    {
        $userDetails = $request->only(['first_name', 'last_name', 'email', 'password']);

        $user = UserRepository::createUser($userDetails);

        if (!$user)
            return back()->with('error', 'There is an error creating your account, please try again later');

        auth()->login($user);

        return redirect()->intended(route('user.profile'));
    }
}
