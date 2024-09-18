<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserRequest $request)  {
        try{
            $user = $this->userRepository->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            auth()->login($user);

            return response()->json(['success' => true, 'redirect' => route('client-dashboard')]);
        } catch (\Exception $e) {
        // Ghi log lỗi và trả về thông báo lỗi
        Log::error($e->getMessage());
        return response()->json(['error' => 'Đã xảy ra lỗi. Vui lòng thử lại sau.'], 500);
    }
    }
}
