
// function setDataInModal ( modalId, responseData )
// {
//     console.log(responseData)
//     console.log(modalId)
//     // Đặt action cho form trong modal
//     $(modalId + ' form').attr('action', responseData.url);

//     // Đổ dữ liệu vào các trường trong modal dựa trên responseData
//     for (const [key, value] of Object.entries(responseData.data)) {
//         let $input = $(modalId +' [name="'+ key + '"]');
//         if ($input.length) {
//             $input.val(value);
//         }
//     }
// }

// function openModalWithData()
// {
//     $(document).on('click', '[data-toggle="modal"]', function() {
//         var targetModal = $( this ).data('target');
//         var url = $( this ).data( 'url' );

//         // Gửi yêu cầu AJAX để lấy dữ liệu
//         $.ajax({
//             url: url,
//             method: 'GET',
//             success: function(response) {
//                 setDataInModal( targetModal, response);
//             }
//         });
//     });
// }

function fetchCities() {
    fetch('/get-cities')
        .then(response => response.json())
        .then( data =>
        {
            const select = document.getElementById('city-select');
            select.innerHTML = '<option value="">Chọn Tỉnh(Thành phố)</option>'; // Reset options
            data.forEach(city => {
                const option = document.createElement('option');
                option.value = city.id.toString().padStart(2, '0');
                option.textContent = city.name;
                select.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
}

function fetchDistricts ( cityId )
{
    fetch(`/get-districts/${cityId}`)
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('district-select');
            select.innerHTML = '<option value="">Chọn Quận(Huyện)</option>'; // Reset options
            data.forEach(district => {
                const option = document.createElement('option');
                option.value = district.id.toString().padStart(3, '0');
                option.textContent = district.name;
                select.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
}


function fetchWards ( districtId )
{
    fetch(`/get-wards/${districtId}`)
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('ward-select');
            select.innerHTML = '<option value="">Chọn Xã(Phường)</option>'; // Reset options
            data.forEach(ward => {
                const option = document.createElement('option');
                option.value = ward.id.toString().padStart(5, '0');
                option.textContent = ward.name;
                select.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
}

function toggleDisabledState(selectId, condition) {
    const select = document.getElementById(selectId);
    if (condition) {
        select.removeAttribute('disabled');
    } else {
        select.setAttribute('disabled', true);
    }
}

function handleFilePreview ( fileInputId, previewImageId )
{
    // Lấy phần tử input và ảnh hiển thị
    const fileInput = document.getElementById(fileInputId);
    const previewImage = document.getElementById(previewImageId);

    // Xóa sự kiện 'change' trước khi thêm lại (nếu cần)
    fileInput.removeEventListener( 'change', handleFileChange );
    
    // Thêm sự kiện 'change' mới
    fileInput.addEventListener('change', handleFileChange);


    function handleFileChange ( event )
    {
        // Kiểm tra nếu có tệp tin được chọn
        if (event.target.files && event.target.files[0]) {
            // Tạo một đối tượng FileReader
            const reader = new FileReader();

            // Khi FileReader đã đọc xong tệp tin
            reader.onload = function(e) {
                // Cập nhật thuộc tính src của ảnh hiển thị
                previewImage.src = e.target.result;
                previewImage.style.display = 'block'; // Hiển thị ảnh
            };

            // Đọc tệp tin dưới dạng Data URL
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // Nếu không có tệp tin nào được chọn, ẩn ảnh
            previewImage.style.display = 'none';
        }
    }

}
