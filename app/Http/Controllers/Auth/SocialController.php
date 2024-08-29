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
                'google_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'password' => bcrypt(Str::random(16)),
            ];
    
            $existingUser = User::where($provider . '_id', $userData['google_id'])->first();
    
            if ($existingUser) Auth::login($existingUser); 
            else {
                $newUser = User::create($userData);
                Auth::login($newUser);
            }
    
            return redirect()->intended('/');
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            dd('Tài khoản không tồn tại');
        }

        
    }
}
