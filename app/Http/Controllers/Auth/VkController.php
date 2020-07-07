<?php


namespace App\Http\Controllers\Auth;

use App\Services\AuthLoginSocialServices;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;



class VkController extends Controller
{
    public function login()
    {
        return Socialite::with('vkontakte')->redirect();
    }
    public function response()
    {
        $user = Socialite::driver('vkontakte')->user();

        return (new AuthLoginSocialServices)->requestVkontakte($user);

    }
}
