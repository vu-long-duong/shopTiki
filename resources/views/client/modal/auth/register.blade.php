<div id="js-modal" class="modal">
    <div class="modal__overfit"></div>
    <div class="modal__content">
        <button class="btn__close"><i class="fa-solid fa-circle-xmark btn__close-icon"></i></button>
        <div id="js-auth-form" class="auth-form">
            <div class="left-modal">
                <div class="auth-form__container">
                    <div class="auth-form__heading">Đăng ký</div>
                    <form action="{{ route('auth.register') }}" method="POST">
                        @csrf
                        <div class="auth-form__body">
                            <div class="input-wrap pdt-16">
                                <input type="text" name="name" class="input-account-form"
                                    placeholder="Tên hiển thị" required>
                                <div class="error-message alert alert-danger" style="display: none;" id="name-error"></div>

                                <input type="text" name="email" class="input-account-form" placeholder="Email"
                                    required>
                                <div class="error-message alert alert-danger" style="display: none;" id="email-error"></div>

                                <input type="text" name="phone" class="input-account-form"
                                    placeholder="Số điện thoại" required>
                                <div class="error-message alert alert-danger" style="display: none;" id="phone-error"></div>

                                <div class="input-password-wrap">
                                    <input type="password" name="password" class="input-password-form flex-1"
                                        placeholder="Mật khẩu" required>
                                    <i class="input-password-icon fa-solid fa-eye"></i>
                                </div>
                                <div class="error-message alert alert-danger" style="display: none;" id="password-error"></div>

                                <div class="input-password-wrap">
                                    <input type="password" name="re_password" class="input-password-form flex-1"
                                        placeholder="Nhập lại mật khẩu" required>
                                    <i class="input-password-icon fa-solid fa-eye"></i>
                                </div>
                                <div class="error-message alert alert-danger" style="display: none;" id="re-password-error"></div>

                            </div>
                            <button type="submit" class="btn btn-primary bg-primary white-color"> Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right-modal">
                <img src="{{ asset('client/images/logo/logo_auth.png') }}" alt="" class="auth-form__img">
                <span class="pdt-16">Mua sắm tại Tiki</span>
                <span class="fs-13">Siêu ưu đãi mỗi ngày</span>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            })
            .then(response => response.json())
            .then(data => {
                //xóa các lỗi trước đó
                document.querySelectorAll('.error-message').forEach(el => 
                {
                    el.innerHTML = '';
                    el.style.display = 'none';
                });
                if (data.errors) {
                    // Hiển thị lỗi dưới trường cụ thể
                    Object.keys(data.errors).forEach(field => {
                        const errorElement = document.getElementById(`${field}-error`);
                        if (errorElement) {
                            errorElement.innerHTML = `<ul><li>${data.errors[field]}</li></ul>`;
                            errorElement.style.display = 'block';
                        }
                    });
                } else {
                    // Đăng ký thành công, có thể đóng modal hoặc chuyển hướng
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>
