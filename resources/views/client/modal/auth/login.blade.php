<div id="js-modal" class="modal">
    <div class="modal__overfit"></div>
    <div class="modal__content">
        <button class="btn__close"><i class="fa-solid fa-circle-xmark btn__close-icon"></i></button>
        <div id="js-auth-form" class="auth-form">
            <div class="left-modal">
                <div class="auth-form__container">
                    <div class="auth-form__heading">Đăng nhập</div>
                    <div class="auth-form__body">
                        <div class="input-wrap pdt-16">
                            <input type="text" class="input-account-form" placeholder="Email/Số điện thoại">
                            <div class="input-password-wrap">
                                <input type="password" class="input-password-form flex-1" placeholder="Mật khẩu">
                                <i class="input-password-icon fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary bg-primary white-color"> Đăng nhập</button>
                        <div class="forgotPassword__Register">
                            <a href="" class="no-light-through fs-13 primary-color">Quên mật khẩu</a>
                            <a href="" class="no-light-through fs-13 primary-color">Đăng nhập bằng sms</a>
                        </div>
                        <div class="social-heading">
                            <span>Hoặc</span>
                        </div>
                        <div class="button-social-wrap">
                            <a href="{{ route('social-auth', ['provider' => 'facebook']) }}" class="btn btn-primary button-social-fb"><i
                                    class="fa-brands fa-facebook"></i>Facebook</a>
                            <a href="{{ route('social-auth', ['provider' => 'google']) }}" class="btn btn-primary button-social-gg"><i
                                    class="fa-brands fa-google"></i>Google</a>
                        </div>
                        <span class="fs-13 text-center">Bạn mới biết đến Tiki<a href=""
                                class="primary-color no-light-through mgl-4">Đăng ký</a></span>
                    </div>
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
