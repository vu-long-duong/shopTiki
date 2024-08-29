<x-modal id="modal-rearrange" title="Sắp xếp trật tự hiển thị" buttonText="Lưu" method="GET" route="">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group input-group-lg">
                <input type="search" class="form-control form-control-lg" placeholder="Nhập tên trường">
            </div>

            <div class="custom-control custom-checkbox pl-4 ml-2 pt-3">
                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                <label for="customCheckbox1" class="custom-control-label">Tất cả</label>
            </div>
            <div class="custom-control custom-checkbox pl-lg-5 pt-3">
                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                <label for="customCheckbox1" class="custom-control-label">Ảnh đại diện</label>
            </div>

        </div>
        <div class="col-md-6 lockscreen rounded-lg">
            <label class="pt-2 pl-2">4 cột đã chọn</label>
            <ul class="list-rearrange pl-3">
                <li class="rearrange d-flex align-items-center"><i class="fas fa-compress-arrows-alt"></i>
                    <span class="ml-2 p-2">Tên</span>
                    <span class="btn btn-tool align-items-center ml-auto"><i class="fas fa-times"></i></span>
                </li>
                <li class="rearrange d-flex align-items-center"><i class="fas fa-compress-arrows-alt"></i>
                    <span class="ml-2 p-2">Tuổi</span>
                    <span class="btn btn-tool align-items-center ml-auto"><i class="fas fa-times"></i></span>
                </li>
                <li class="rearrange d-flex align-items-center"><i class="fas fa-compress-arrows-alt"></i>
                    <span class="ml-2 p-2">Số điện thoại</span>
                    <span class="btn btn-tool align-items-center ml-auto"><i class="fas fa-times"></i></span>
                </li>
                <li class="rearrange d-flex align-items-center"><i class="fas fa-compress-arrows-alt"></i>
                    <span class="ml-2 p-2">Địa chỉ</span>
                    <span class="btn btn-tool align-items-center ml-auto"><i class="fas fa-times"></i></span>
                </li>
            </ul>
        </div>
    </div>
</x-modal>

<script>
    $(document).ready(function() {
        $(".list-rearrange").sortable();
        $(".list-rearrange").disableSelection();
    });
</script>
