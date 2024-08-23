<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->user();
    
            $userData = [
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
            ];
    
            $userData[$provider . '_id'] = $user->id;
    
            $existingUser = User::where($provider . '_id', $user->id)->first();
    
            if ($existingUser) Auth::login($existingUser); 
            else {
                $newUser = User::create($userData + ['password' => bcrypt(Str::random(16))]);
                Auth::login($newUser);
            }
    
            return redirect()->intended('/');
        } catch (\Throwable $th) {
            dd('Tài khoản không tồn tại');
        }

        
    }
}
