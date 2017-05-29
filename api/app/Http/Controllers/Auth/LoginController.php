<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repo\UserRepo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepo $users)
    {
        $this->users = $users;
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Faceook.
     *
     * @return Response
     */
    public function handleFacebookCallback()
    {
        $facebook_user = Socialite::driver('facebook')->user();

        if (!$user = $this->users->getByFacebookId($facebook_user->id)) {
            return $this->registerFacebookUser($facebook_user);
        }

        return $this->updateFacebookUserToken($user->id, $facebook_user->token);
    }

    protected function registerFacebookUser($facebook_user)
    {
        return $this->users->store([
            'facebook_id'      => $facebook_user->id,
            'facebook_token'   => $facebook_user->token,
            'name'             => $facebook_user->name,
            'email'            => $facebook_user->email,
            'facebook_avatar'  => $facebook_user->avatar,
            'facebook_profile' => $facebook_user->profileUrl,
        ]);
    }

    protected function updateFacebookUserToken($user_id, $facebook_token)
    {
        return $this->users->update($user_id, compact('facebook_token'));
    }
}
