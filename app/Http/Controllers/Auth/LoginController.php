<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Provider;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

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
    protected $redirectTo = '/posts';

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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $found_user = Provider::where(['provider_id'=> $user->id,'provider_name'=>$provider])->first()->user;
        if (!$found_user) {
            $new_user=User::create([
                'email' => $user->email,
                'name' => $user->name
            ]);
            // dd($new_user);
            Provider::create([
                'provider_id' => $user->id,
                'provider_name' => $provider,
                'token' => $user->token ,
                'user_id' => $new_user ->id
            ]);
            $found_user = $new_user;
        }
        Auth::login($found_user);
        return redirect()->route('posts.index');
    }
}
