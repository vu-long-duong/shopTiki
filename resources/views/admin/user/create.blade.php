<x-modal id="content-create" title="Tạo mới người dùng" buttonText="Lưu" method="POST"
    route="{{ route('admin.users.store') }}">
    <div class="row">
        <div class="card-body col-md-6">
            <x-form.input title="Tên" name="name" type="text" required></x-form.input>
            <x-form.input title="Email" name="email" type="text" required></x-form.input>
            <x-form.input title="Số điện thoại" name="phone" type="text" required></x-form.input>
            <x-form.input title="Mật khẩu" name="password" type="password" required></x-form.input>
            <x-form.input title="Tuổi" name="age" type="text"></x-form.input>
            <x-form.input title="Địa chỉ" name="address" type="text"></x-form.input>

            <div class="form-group">
                <label>Tỉnh(Thành phố)</label>
                <select class="form-control" id="city-select" name="city_id">
                    <option value="">Chọn Tỉnh(Thành phố)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Quận(Huyện)</label>
                <select class="form-control" id="district-select" name="district_id" disabled>
                    <option value="">Chọn Quận(Huyện)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Xã(Phường)</label>
                <select class="form-control" id="ward-select" name="ward_id" disabled>
                    <option value="">Chọn Xã(Phường)</option>
                </select>
            </div>
        </div>
        <div class="card-body col-md-6">
            <x-form.input title="Mã bưu điện" name="postal_code" type="text"></x-form.input>
            <x-form.input title="Quốc gia" name="country" type="text"></x-form.input>

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
            </select>

            <x-form.input title="Ngày sinh" name="date_of_birth" type="date"></x-form.input>

            <div class="form-group">
                <label>Chức vụ</label>
                <select class="form-control" name="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                    <option value="SuperAdmin">SuperAdmin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Tải ảnh lên</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
                        <label class="custom-file-label">Chọn file</label>
                    </div>
                </div>
                <img id="previewImage" src="" alt="Image preview"
                    style="display: none; max-width: 100px; margin-top: 10px;">
            </div>

        </div>
    </div>
</x-modal>

<script>

    document.addEventListener('DOMContentLoaded', function() {
            handleFilePreview('customFile', 'previewImage');
        });

</script>
