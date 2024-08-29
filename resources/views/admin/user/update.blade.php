<x-modal id="modal-update" title="Cập nhật người dùng" buttonText="Cập nhật" method="POST"
    route="{{ route('admin.users.update', ['id' => $user->id]) }}">
    @method('PUT')
    <div class="row">
        <div class="card-body col-md-6">
            <x-form.input title="Tên" id="name" name="name" type="text"
                value="{{ old('name', $user->name) }}" required></x-form.input>
            <x-form.input title="Email" id="email" name="email" type="text"
                value="{{ old('email', $user->email) }}" required></x-form.input>
            <x-form.input title="Số điện thoại" id="phone" name="phone" type="text"
                value="{{ old('phone', $user->phone) }}" required></x-form.input>
            <x-form.input title="Tuổi" id="age" name="age" type="text"
                value="{{ old('name', $user->age) }}"></x-form.input>
            <x-form.input title="Địa chỉ" id="address" name="address" type="text"
                value="{{ old('name', $user->address) }}"></x-form.input>
            <x-form.input title="Xã(Phường)" id="ward" name="ward" type="text"
                value="{{ old('ward', $user->ward) }}"></x-form.input>
            <x-form.input title="Huyện(Quận)" id="district" name="district" type="text"
                value="{{ old('district', $user->district) }}"></x-form.input>
            <x-form.input title="Tỉnh(Thành phố)" id="city" name="city" type="text"
                value="{{ old('ward', $user->city) }}"></x-form.input>
        </div>
        <div class="card-body col-md-6">
            <x-form.input title="Mã bưu điện" id="postal_code" name="postal_code"
                value="{{ old('postal_code', $user->postal_code) }}" type="text"></x-form.input>
            <x-form.input title="Quốc gia" id="country" name="country" type="text"
                value="{{ old('country', $user->country) }}"></x-form.input>

            <label>Giới tính</label>
            <select class="form-control" name="gender">
                <option value="" {{ old('gender', $user->gender) == '' ? 'selected' : '' }}>Chọn giới tính
                </option>
                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Nam
                </option>
                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Nữ
                </option>
                <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Khác
                </option>
            </select>

            <x-form.input title="Ngày sinh" id="date_of_birth" name="date_of_birth"
                value="{{ old('date_of_birth', $user->date_of_birth) }}" type="date"></x-form.input>

            <div class="form-group">
                <label for="exampleInputFile">Tải ảnh lên</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_picture" name="profile_picture">
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Chức vụ</label>
                <select class="form-control" name="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                    <option value="SuperAdmin">SuperAdmin</option>
                </select>
            </div>
        </div>
    </div>
</x-modal>
