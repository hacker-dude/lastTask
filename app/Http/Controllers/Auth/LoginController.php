<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Socialite;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            "email"=>$user->email
        ],[
            "email"=>$user->email,
            "name"=>$user->name,
            "password"=>Hash::make(Str::random(8)),
        ]);

        Auth::login($user, true);
        return redirect()->route("home");
    }

    public function google()
    {  
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        $user = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            "email"=>$user->email
        ],[
            "email"=>$user->email,
            "name"=>$user->name,
            "password"=>Hash::make(Str::random(8)),
        ]);

        Auth::login($user, true);
        return redirect()->route("home");
    }

}
