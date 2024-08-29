<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View as ViewView;
use Symfony\Component\HttpFoundation\JsonResponse as HttpFoundationJsonResponse;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('locale');
    }

    public function store(UserRequest $request) : RedirectResponse {
        
        $data = $request->only(['name', 'email', 'password','age', 'phone', 'gender','ward', 'district', 'city', 'postal_code',
        'country', 'date_of_birth', 'profile_picture']);

        $data['password'] = bcrypt($data['password']);
        $user = $this->userRepository->create($data);

        return redirect()->route('admin.users.show')->with('success', 'Tạo mới người dùng thành công!');
    }

    public function oneUser($id) : JsonResponse {
        $user = $this->userRepository->find($id);

        return $this->responseBase('susscess', 201, $user, 'Cập nhật người dùng thành công!');
    }

    public function show() : View {
        $users = $this->userRepository->load('role')->paginate(env('PAGINATE'));
        $headers = $this->headerColumns('users');

        return view('admin.user.index', compact('users', 'headers'));
    }

    public function update(Request $request, $id) : RedirectResponse  {
        $data = $request->only(['name', 'email','age', 'phone', 'gender','ward', 'district', 'city', 'postal_code',
        'country', 'date_of_birth', 'profile_picture']);

        $user = $this->userRepository->update($data, $id);

        return redirect()->route('admin.users.show')->with('success','Cập nhật người dùng thành công');
    }

    public function destroy($id) : JsonResponse {
        $this->userRepository->delete($id);

        return $this->responseBase('success', 204, null, 'Xóa người dùng thành công');
    }

    public function search(Request $request) : JsonResponse {
        $query = $request->input('query');
        $users = $this->userRepository->search($query);
        return $this->responseBase('success', 200, $users,null);
    }
}
