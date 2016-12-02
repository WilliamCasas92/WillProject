<?php

namespace App\Http\Controllers;
use Auth;
use Socialite;

class SocialController extends Controller {

    public function __construct(){
        $this->middleware('guest');
    }

    public function getSocialAuth($provider=null)
    {
        if(!config("services.$provider")) abort('404');

        return Socialite::driver($provider)->redirect();
    }


    public function getSocialAuthCallback($provider=null)
    {
        if($user = Socialite::driver($provider)->user()){
            //dd($user);
            // OAuth Two Providers
            $token = $user->token;
            $refreshToken = $user->refreshToken; // not always provided
            $expiresIn = $user->expiresIn;

            // OAuth One Providers
            $token = $user->token;
            $tokenSecret = $user->tokenSecret;

            // All Providers
            $user->getId();
            $user->getNickname();
            $user->getName();
            $user->getEmail();
            $user->getAvatar();

        }else{
            return 'Error';
        }
    }
}