<?php


namespace App\Services;


use App\Models\AuthData;
use App\Models\User;

class AuthLoginSocialServices
{
    public function requestFacebook($user)
    {
        $status = false;
        $email = $user->getEmail();

        $internalUser = User::where('email', $email)->first();

        if(!$internalUser) return redirect()->route('register');


        $objAuth = new AuthData();

        $check = $objAuth->where('user_id', $internalUser->id)->where('network', 'fb')->first();
        if($check) {
            $check->nickname = $user->nickname;
            $check->name = $user->name;
            $check->avatar = $user->getAvatar(); // можно получать свойства через метод getAvatar()
            $status = $check->save();
        } else {
            $status = (bool)$objAuth->create([
                'user_id' => $internalUser->id,
                'network' => 'fb',
                'nickname' => $user->getNickname(),
                'name' => $user->getName(),
                'avatar' => $user->getAvatar()
            ]);
        }

        if($status) {
            \Auth::login($internalUser);
            return redirect()->route('index');
        }

        \Log::error('Юзер не смог зарегаться');
        return redirect()->route('register');
    }

    public function requestVkontakte($user)
    {
        $email = $user->email;
        $status = false;
        $internalUser = User::where('email', $email)->first();

        if(!$internalUser) return redirect()->route('register');
        $objAuth = new AuthData();

        $check = $objAuth->where('user_id', $internalUser->id)->where('network', 'vk')->first();
        if($check) {
            $check->nickname = $user->nickname;
            $check->name = $user->name;
            $check->avatar = $user->getAvatar(); // можно получать свойства через метод getAvatar()
            $status = $check->save();
        } else {
            $status = (bool)$objAuth->create([
                'user_id' => $internalUser->id,
                'network' => 'vk',
                'nickname' => $user->getNickname(),
                'name' => $user->getName(),
                'avatar' => $user->getAvatar()
            ]);
        }

        if($status) {
            \Auth::login($internalUser);
            return redirect()->route('index');
        }

        \Log::error('Юзер не смог зарегаться');
        return redirect()->route('register');
    }
}
