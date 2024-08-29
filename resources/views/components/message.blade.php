<script>
    $(function() {

        let errors = @json($errors->toArray());
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        if (Object.keys(errors).length > 0) {
            let errors_message = [];
            Object.keys(errors).forEach(key =>
                errors[key].forEach(error =>
                    errors_message.push(key + ' : ' + error + '</br>')));

            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Có lỗi',
                body: errors_message,
            })
        } else {
            @if (session('success'))
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Thành công',
                    body: '{{ session('success') }}',
                })
            @endif
        }
    });
</script>