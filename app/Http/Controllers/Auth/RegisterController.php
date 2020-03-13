<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupFormRequest;
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
     * @param SignupFormRequest $request
     * @return RedirectResponse
     */
    public function register(SignupFormRequest $request)
    {
        $userDetails = $request->only(['first_name', 'last_name', 'email', 'password', 'is_vendor']);

        $user = UserRepository::createUser($userDetails);

        auth()->login($user);

        $userType = strtolower($user->getType());

        return redirect()->intended(route("$userType.profile"));
    }
}
