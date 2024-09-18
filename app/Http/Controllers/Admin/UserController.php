<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Entities\City;
use App\Entities\District;
use App\Entities\Ward;
use App\Http\Controllers\All\ImageTraits;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Entities\Role;
use App\Entities\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View as ViewView;
use Symfony\Component\HttpFoundation\JsonResponse as HttpFoundationJsonResponse;

class UserController extends Controller
{
    protected $userRepository;
    use ImageTraits;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function store(UserRequest $request) : RedirectResponse {
        
        $data = $request->only(['name', 'email', 'password','age', 'phone', 'address', 'gender','ward_id', 'district_id', 'city_id', 'postal_code',
        'country', 'date_of_birth', 'profile_picture']);

        $data['password'] = bcrypt($data['password']);
        
        if($request->hasFile('profile_picture')){
            $profilePicturePath = $this->uploadImage($data['profile_picture'], 'users');
            $data['profile_picture'] = $profilePicturePath;
        }

        $this->userRepository->create($data);

        return redirect()->route('admin.users.index')->with('success', 'Tạo mới người dùng thành công!');
    }

    public function oneUser($id) : JsonResponse {
        $user = $this->userRepository
            ->find($id);

        $user->city_name = $user->city->name ?? 'N/A';
        $user->district_name = $user->district->name ?? 'N/A';
        $user->ward_name = $user->ward->name ?? 'N/A';
        $user->role_name = $user->role->name ?? 'N/A';

        // Thêm danh sách roles
        $user->roles = Role::all();

        // Ẩn các quan hệ không cần thiết
        $user->makeHidden(['city', 'district', 'ward']);
        
        return $this->responseBase('susscess', 200, $user->toArray());
    }

    // public function oneUser($id) {
    //     $mergedArray = array();
    //     $user = $this->userRepository
    //         ->find($id)
    //         ->load('role');
    //     $roles = Role::all();

    //     $mergedArray = array_merge($user->toArray(), ['roles'=>$roles->toArray()]);
        
    //     return $this->getImageFromGoogleDrive('users/user_default');
    // }

    public function index() : View {
        $users = $this->userRepository
            ->orderBy('id', 'desc')
            ->paginate(env('PAGINATE'));

        $tableName = (new User())->getTable();

        return view('admin.user.index', compact('users', 'tableName'));
    }

    public function update(UserRequest $request, $id) : RedirectResponse  {
        $data = $request->only(['name', 'email','age', 'phone', 'address', 'gender','ward_id', 'district_id', 'city_id', 'postal_code',
        'country', 'date_of_birth', 'profile_picture']);

        $this->userRepository->update($data, $id);

        return redirect()->route('admin.users.index')->with('success','Cập nhật người dùng thành công');
    }

    public function destroy($id) : RedirectResponse {
        if($id) {
            $this->userRepository->delete($id);
            return redirect()->route('admin.users.index')->with('success','Xóa người dùng thành công');
        }
        return $this->responseBase('errors', 204, null, 'Không tìm thấy người dùng');
    }

    public function search(Request $request) : JsonResponse {
        $query = $request->input('query');
        $users = $this->userRepository->search($query);
        return $this->responseBase('success', 200, $users,null);
    }

    public function getCities() : JsonResponse {
        $cities = City::all();
        return response()->json($cities);
    }

    public function getDistricts($cityId) : JsonResponse {
        $districts = District::where('city_id', $cityId)->get();
        return response()->json($districts);
    }

    public function getWards($districtId) : JsonResponse {
        $wards = Ward::where('district_id', $districtId)->get();
        return response()->json($wards);
    }

}
