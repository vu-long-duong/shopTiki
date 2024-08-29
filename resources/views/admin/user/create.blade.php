<x-modal id="modal-create" title="Tạo mới người dùng" buttonText="Lưu" method="POST" route="{{ route('admin.users.store') }}">
    <div class="row">
        <div class="card-body col-md-6">
            <x-form.input title="Tên" id="name" name="name" type="text" required></x-form.input>
            <x-form.input title="Email" id="email" name="email" type="text" required></x-form.input>
            <x-form.input title="Số điện thoại" id="phone" name="phone" type="text" required></x-form.input>
            <x-form.input title="Mật khẩu" id="password" name="password" type="password" required></x-form.input>
            <x-form.input title="Tuổi" id="age" name="age" type="text"></x-form.input>
            <x-form.input title="Địa chỉ" id="address" name="address" type="text"></x-form.input>
            <x-form.input title="Xã(Phường)" id="ward" name="ward" type="text"></x-form.input>
            <x-form.input title="Huyện(Quận)" id="district" name="district" type="text"></x-form.input>
            <x-form.input title="Tỉnh(Thành phố)" id="city" name="city" type="text"></x-form.input>
        </div>
        <div class="card-body col-md-6">
            <x-form.input title="Mã bưu điện" id="postal_code" name="postal_code" type="text"></x-form.input>
            <x-form.input title="Quốc gia" id="country" name="country" type="text"></x-form.input>

            <label>Giới tính</label>
            <select class="form-control" name="gender">
                <option value="" {{ old('gender', $user->gender ?? '') == '' ? 'selected' : '' }}>Chọn giới tính
                </option>
                <option value="male">Nam
                </option>
                <option value="female">Nữ
                </option>
                <option value="other">Khác
                </option>
                {{-- <option value="other" {{ old('gender', $user->gender ?? '') == 'other' ? 'selected' : '' }}>Khác --}}
            </select>

            <x-form.input title="Ngày sinh" id="date_of_birth" name="date_of_birth" type="date"></x-form.input>

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

