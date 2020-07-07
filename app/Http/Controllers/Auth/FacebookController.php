<?php


namespace App\Http\Controllers\Auth;


use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Services\AuthLoginSocialServices;

class FacebookController extends Controller
{
    public function login()
    {
        return Socialite::with('facebook')->redirect();
    }

    public function response()
    {

        $user = Socialite::driver('facebook')->user();


        return (new AuthLoginSocialServices)->requestFacebook($user);


    }

}
