<x-modal id="content-rearrange" title="Sắp xếp trật tự hiển thị" buttonText="Lưu" method="GET" route="">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group input-group-lg">
                <input type="search" class="form-control form-control-lg" placeholder="Nhập tên trường">
            </div>

            <div class="custom-control custom-checkbox pl-4 ml-2 pt-3">
                <input class="custom-control-input" type="checkbox" id="checkAll" value="option1">
                <label for="checkAll" class="custom-control-label">Tất cả</label>
            </div>

            <ul id="container_header" style="max-height: 450px; overflow: scroll; margin-bottom: 0px;"></ul>

        </div>
        <div class="col-md-6 lockscreen rounded-lg">
            <label class="pt-2 pl-2"><span id="quantity_checked" class="mr-1">4</span><span>cột đã chọn</span></label>
            <ul id="container_header_checked" class="list-rearrange pl-3" style="max-height: 498px; overflow: scroll; margin-bottom: 0px;"></ul>
        </div>
    </div>
</x-modal>

<script>
    // tạo các header thông qua API
    $(document).on('click', '[data-target="#content-rearrange"]', function() {
        var targetModal = $(this).data('target');
        var url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                // Lấy đối tượng chứa các trường
                let fields = Object.entries(response.data);

                // Chọn phần tử cha mà bạn muốn thêm các thẻ động vào
                let container = document.getElementById('container_header');
                container.innerHTML = '';

                // Duyệt qua từng trường và tạo HTML động
                fields.forEach(([key, value]) => {

                    let customDiv = document.createElement('li');
                    customDiv.className = 'custom-control custom-checkbox pt-3';

                    let checkbox = document.createElement('input');
                    checkbox.className = 'custom-control-input';
                    checkbox.type = 'checkbox';
                    checkbox.id = key;
                    // checkbox.checked = true;
                    // checkbox.disabled = true;

                    let label = document.createElement('label');
                    label.className = 'custom-control-label';
                    label.setAttribute('for', key);
                    label.innerText = value.charAt(0).toUpperCase() + value.slice(1);

                    customDiv.appendChild(checkbox);
                    customDiv.appendChild(label);

                    // Thêm phần tử vào container
                    container.appendChild(customDiv);
                });
            }
        });
    });

    $(document).ready(function() {
        // Hàm để cập nhật số lượng checkbox đã được chọn
        function updateCheckedQuantity() {
            // Đếm số lượng checkbox đã được chọn
            let checkedCount = $('#container_header input[type="checkbox"]:checked').length;

            // Cập nhật số lượng vào thẻ có id là quantity_checked
            $('#quantity_checked').text(checkedCount);
        }

        // Hàm để thêm thẻ <li> vào #container_header_checked dựa trên checkbox
        function addCheckedItem(id, labelText) {
            let listItem = `
            <li class="rearrange d-flex align-items-center" data-name="${id}">
                <i class="fas fa-compress-arrows-alt"></i>
                <span class="ml-2 p-2" name="${id}">${labelText}</span>
                <span class="btn btn-tool align-items-center ml-auto"><i class="fas fa-times"></i></span>
            </li>`;
            $('#container_header_checked').append(listItem);
        }

        // Hàm để xóa thẻ <li> từ #container_header_checked dựa trên id
        function removeCheckedItem(id) {
            $('#container_header_checked').find(`li[data-name="${id}"]`).remove();
        }

        // Sự kiện thay đổi của checkbox "Tất cả"
        $('#checkAll').change(function() {
            // Thay đổi trạng thái của tất cả các checkbox trong container_header theo trạng thái của #checkAll
            let isChecked = this.checked;
            $('#container_header input[type="checkbox"]').prop('checked', isChecked);

            // Xóa tất cả các thẻ <li> nếu bỏ check "Tất cả"
            if (!isChecked) {
                $('#container_header_checked').empty();
            } else {
                // Nếu "Tất cả" được check, thêm tất cả các checkbox vào #container_header_checked
                $('#container_header input[type="checkbox"]').each(function() {
                    let id = $(this).attr('id');
                    let labelText = $(this).closest('li').find('label').text();
                    addCheckedItem(id, labelText);
                });
            }

            // Cập nhật số lượng checkbox đã chọn
            updateCheckedQuantity();
        });

        // Khi bất kỳ checkbox nào trong container_header được thay đổi
        $('#container_header').on('change', 'input[type="checkbox"]', function() {
            let id = $(this).attr('id'); // Lấy giá trị thuộc tính id của checkbox
            let labelText = $(this).closest('li').find('label').text(); // Lấy nhãn của checkbox

            if (this.checked) {
                // Nếu checkbox được check, thêm thẻ li vào #container_header_checked
                addCheckedItem(id, labelText);
            } else {
                // Nếu checkbox bị bỏ check, xóa thẻ li có data-name tương ứng
                removeCheckedItem(id);
            }

            // Kiểm tra nếu tất cả các checkbox con đều được chọn
            let allChecked = $('#container_header input[type="checkbox"]').length === $(
                '#container_header input[type="checkbox"]:checked').length;
            $('#checkAll').prop('checked', allChecked);

            // Cập nhật số lượng checkbox đã chọn
            updateCheckedQuantity();
        });

        // Xử lý khi nhấn nút xóa trong thẻ li để bỏ check checkbox tương ứng
        $('#container_header_checked').on('click', '.btn-tool', function() {
            let listItem = $(this).closest('li');
            let id = listItem.attr('data-name');

            // Bỏ check checkbox tương ứng trong #container_header
            $(`#container_header input[id="${id}"]`).prop('checked', false);

            // Xóa thẻ li khi nhấn vào nút xóa
            listItem.remove();

            // Cập nhật số lượng checkbox đã chọn
            updateCheckedQuantity();

            // Kiểm tra lại trạng thái của checkbox "Tất cả"
            let allChecked = $('#container_header input[type="checkbox"]').length === $(
                '#container_header input[type="checkbox"]:checked').length;
            $('#checkAll').prop('checked', allChecked);
        });

        // Cập nhật số lượng checkbox đã chọn khi trang được tải lần đầu
        updateCheckedQuantity();
    });


    $(document).ready(function() {
        $(".list-rearrange").sortable();
        $(".list-rearrange").disableSelection();
    });
</script>
