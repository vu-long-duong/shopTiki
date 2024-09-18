<x-modal id="content-update" title="Cập nhật người dùng" buttonText="Cập nhật" method="POST" route="">
    @method('PUT')
    <div class="row">
        <div class="card-body col-md-6">
            <x-form.input title="Tên" name="name" type="text" value="" required></x-form.input>
            <x-form.input title="Email" name="email" type="text" value="" required></x-form.input>
            <x-form.input title="Số điện thoại" name="phone" type="text" value="" required></x-form.input>
            <x-form.input title="Tuổi" name="age" type="text" value=""></x-form.input>
            <x-form.input title="Địa chỉ" name="address" type="text" value=""></x-form.input>
            <div class="form-group">
                <label>Tỉnh(Thành phố)</label>
                <select class="form-control" name="city" id="city-select">
                    <option value="">Chọn Tỉnh(Thành phố)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Quận(Huyện)</label>
                <select class="form-control" name="district" id="district-select" disabled>
                    <option value="">Chọn Quận(Huyện)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Xã(Phường)</label>
                <select class="form-control" name="ward" id="ward-select" disabled>
                    <option value="">Chọn Xã(Phường)</option>
                </select>
            </div>
        </div>
        <div class="card-body col-md-6">
            <x-form.input title="Mã bưu điện" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}"
                type="text"></x-form.input>
            <x-form.input title="Quốc gia" name="country" type="text" value=""></x-form.input>

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

            <x-form.input title="Ngày sinh" name="date_of_birth" value="" type="date"></x-form.input>

            <div class="form-group">
                <label for="exampleInputFile">Tải ảnh lên</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_picture" name="profile_picture">
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                    </div>
                </div>
                <img name="profile_picture_old" src="" alt="Image preview"
                    style="display: none; width: 200px; height:200px; margin-top: 10px;">
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
<script>



    $(document).on('click', '[data-target="#content-update"]', function() {
        var targetModal = $(this).data('target');
        var url = $(this).data('url');
        // console.log(url);

        // Gửi yêu cầu AJAX để lấy dữ liệu
        if (url) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    console.log(response.data.district_name)
                    $(targetModal).find('input[name="name"]').val(response.data.name);
                    $(targetModal).find('input[name="email"]').val(response.data.email);
                    $(targetModal).find('input[name="phone"]').val(response.data.phone);
                    $(targetModal).find('input[name="age"]').val(response.data.age);
                    $(targetModal).find('input[name="address"]').val(response.data.address);
                    $(targetModal).find('input[name="postal_code"]').val(response.data.postal_code);
                    $(targetModal).find('input[name="country"]').val(response.data.country);
                    $(targetModal).find('input[name="date_of_birth"]').val(response.data
                        .date_of_birth);
                    $(targetModal).find('select[name="gender"]').val(response.data.gender);
                    $(targetModal).find('select[name="role"]').val(response.data.role.name);

                    // $(targetModal).find('select[name="city"]').append(new Option(response.data
                    //     .city_name, response.data.city_id));
                    // $(targetModal).find('select[name="district"]').append(new Option(response.data
                    //     .district_name, response.data.district_id));
                    // $(targetModal).find('select[name="ward"]').append(new Option(response.data
                    //     .ward_name, response.data.ward_id));

                    // // Sau đó gán giá trị
                    // $(targetModal).find('select[name="city"]').val(response.data.city_id);
                    // $(targetModal).find('select[name="district"]').val(response.data.district_id);
                    // $(targetModal).find('select[name="ward"]').val(response.data.ward_id);

                    $(targetModal).find('img[name="profile_picture_old"]').attr('src',
                        'https://drive.google.com/file/d/1i3TTvm_Xm5_vDJmu6CtOgq6tVg1kGB_Y/preview'
                        );
                    // setTimeout(function() {
                    //     $(targetModal).find('img[name="profile_picture_old"]').attr('src', 'https://drive.google.com/file/d/1i3TTvm_Xm5_vDJmu6CtOgq6tVg1kGB_Y/preview');
                    // }, 100)

                    var updateUrl = "{{ route('admin.users.update', ':id') }}";
                    updateUrl = updateUrl.replace(':id', response.data.id); // Thay thế ID trong URL
                    $(targetModal).find('form').attr('action', updateUrl);
                }
            });
        }
    });
</script>
