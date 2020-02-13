<?php

namespace App\Http\Controllers;

use App\Models\User;
use Socialite;
use Auth;
use Exception;
use Illuminate\Http\Request;

class SocialAuthLinkedinController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('linkedin')->setScopes(['r_liteprofile', 'r_emailaddress', 'w_member_social'])->redirect();
    }

    public function callback()
    {
        try {
            $linkdinUser = Socialite::driver('linkedin')->user();
            $existUser = User::where('email', $linkdinUser->email)->first();
            if ($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $linkdinUser->name;
                $user->email = $linkdinUser->email;
                $user->linkedin_id = $linkdinUser->id;  
                $user->linkedin_name = $linkdinUser->name;
                $user->is_employer=0;
                $user->linkedin_token = $linkdinUser->token;
                $user->password = md5(rand(1, 10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/');
        } catch (Exception $e) {
            return $e;
        }
    }
}
