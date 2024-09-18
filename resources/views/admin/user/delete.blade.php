<x-modal id="content-delete" title="Xóa người dùng" buttonText="Xóa" method="POST"
    route="" class="btn btn-danger">
    @method('DELETE')
    <div>Bạn có muốn xóa người dùng có id là <span id="user_id"></span> hay không?</div>
</x-modal>
<script>
    $(document).on('click', '[data-target="#content-delete"]', function() {
        var targetModal = $(this).data('target');
        var url = $(this).data('url');

        // Gửi yêu cầu AJAX để lấy dữ liệu
        if (url) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    console.log($(targetModal).find('span[id="user_id"]'))
                    $(targetModal).find('span[id="user_id"]').text(response.data.id);

                    var deleteUrl = "{{ route('admin.users.destroy', ':id') }}";
                    deleteUrl = deleteUrl.replace(':id', response.data.id); // Thay thế ID trong URL
                    $(targetModal).find('form').attr('action', deleteUrl);
                }
            });
        }
    });
</script>
