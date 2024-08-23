<header class="header bg-white">
    <div class="grid flex">
        <div class="header__logo">
            <img src="{{ asset('images/logo/logo_Tiki.png')}}" class="header__logo-img" alt="tiki-logo">
            <span class="header__logo-text">Tốt & Nhanh</span>
        </div>
        <div class="searchContainer__titleContainer">
            <div class="header__search">
                <div class="header__search-wrap">
                    <i class="header__search-icon fa-light fa-magnifying-glass"></i>
                    <input class="header__search-input" type="text" placeholder="Bạn tìm gì hôm nay">

                    <div class="search_history">
                        <div class="search_history-heading">
                            <h3 class="search_history-heading-text">Đón chờ siêu sale 8.8</h3>
                            <img src="{{ asset('images/search/vouncher2_search.png')}}" alt="" class="search_history-heading-img">
                        </div>
                        <div class="search_history-main">
                            <ul class="search_history-main-list">
                                <li class="search_history-main-item">
                                    <a href="" class="search_history-main-link">
                                        <i class="search_history-main-icon fa-duotone fa-solid fa-magnifying-glass"></i>
                                        <span class="search_history-main-text">sưởi ấm mặt trời</span>
                                    </a>
                                </li>
                                <li class="search_history-main-item">
                                    <a href="" class="search_history-main-link">
                                        <i class="search_history-main-icon fa-duotone fa-solid fa-magnifying-glass"></i>
                                        <span class="search_history-main-text">phiếu quà tặng</span>
                                    </a>
                                </li>
                                <li class="search_history-main-item">
                                    <a href="" class="search_history-main-link">
                                        <i class="search_history-main-icon fa-duotone fa-solid fa-magnifying-glass"></i>
                                        <span class="search_history-main-text">búp sen xanh</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="flex">
                                <!-- <button class="btn btn-primary mg-auto no-hover">Xem thêm<i class="mgl-4 fa-light fa-chevron-down"></i></button> -->
                                <button class="btn btn-primary mg-auto no-hover">Rút gọn<i class="mgl-4 fa-light fa-chevron-up"></i></button>
                            </div>
                        </div>
                        <div class="search_history-popular">
                            <div class="search_history-popular-heading">
                                <img src="{{ asset('images/search/population_icon.png')}}" class="search_history-popular-heading-img" alt="">
                                <h3 class="search_history-popular-heading-text">Tìm kiếm phổ biến</h3>
                            </div>
                            <div href="" class="search_history-popular-list">
                                <a class="search_history-popular-item">
                                    <img src="{{ asset('images/search/item_popular1.png')}}" class="search_history-popular-item-img" alt="">
                                    <div class="search_history-popular-item-text">anessa official store</div>
                                </a>
                                <a class="search_history-popular-item">
                                    <img src="{{ asset('images/search/item_popular2.png')}}" class="search_history-popular-item-img" alt="">
                                    <div class="search_history-popular-item-text">áo khoác nam trung niên</div>
                                </a>
                                <a class="search_history-popular-item">
                                    <img src="{{ asset('images/search/item_popular3.png')}}" class="search_history-popular-item-img" alt="">
                                    <div class="search_history-popular-item-text">áo sơ mi nu tay ngắn</div>
                                </a>
                                <a class="search_history-popular-item">
                                    <img src="{{ asset('images/search/item_popular4.png')}}" class="search_history-popular-item-img" alt="">
                                    <div class="search_history-popular-item-text">áo sơ mi nu tay ngắn</div>
                                </a>
                                <a class="search_history-popular-item">
                                    <img src="{{ asset('images/search/item_popular5.png')}}" class="search_history-popular-item-img" alt="">
                                    <div class="search_history-popular-item-text">áo sơ mi nu tay ngắn</div>
                                </a>
                                <a class="search_history-popular-item">
                                    <img src="{{ asset('images/search/item_popular6.png')}}" class="search_history-popular-item-img" alt="">
                                    <div class="search_history-popular-item-text">áo sơ mi nu tay ngắn</div>
                                </a>
                            </div>
                        </div>
                        <div class="search_history-category mgl-16">
                            <h3 class="search_history-category-heading">Danh mục nổi bật</h3>
                            <ul class="search_history-category-list">
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category1.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Đồ chơi - Mẹ và bé</span>
                                </li>
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category2.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Điện thoại - Máy tính bảng</span>
                                </li>
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category3.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Ngon</span>
                                </li>
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category4.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Làm đẹp - Sức khỏe</span>
                                </li>
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category5.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Điện gia dụng</span>
                                </li>
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category6.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Thời trang nữ</span>
                                </li>
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category7.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Thời trang nam</span>
                                </li>
                                <li class="search_history-category-item">
                                    <div class="search_history-category-item-bg">
                                        <img src="{{ asset('images/search/item_category8.png')}}" alt="" class="search_history-category-img">
                                    </div>
                                    <span class="search_history-category-text">Giày - Dép nữ</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <button class="header__search-btn header__search-separate btn btn-primary ">Tìm kiếm</button>
                </div>
                <div class="header__user">
                    <div class="header__user-head-wrap header__user--active">
                        <i class="header__user-head-icon fa-solid fa-house"></i>
                        <div class="header__user-head">Trang chủ</div>
                    </div>
                    <div class="header__user-head-wrap header__user-head-account">
                        <i class="header__user-head-icon fa-regular fa-face-grin-wink"></i>
                        <div class="header__user-head">Tài khoản</div>
                        <ul class="header__user-control-list">
                            <li class="header__user-control-item"><a href="" class="header__user-control-link">Thông tin tài khoản</a></li>
                            <li class="header__user-control-item"><a href="" class="header__user-control-link">Đơn hàng của tôi</a></li>
                            <li class="header__user-control-item"><a href="" class="header__user-control-link">Trung tâm hỗ trợ</a></li>
                            <li class="header__user-control-item"><a href="" class="header__user-control-link">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <div class="header__user-cart-wrap header__user-cart-separate">
                        <i class="header__user-cart-icon  fa-regular fa-cart-shopping"></i>
                        <span class="header__user-cart-qnt">3</span>
                    </div>
                </div>
            </div>
            <div class="header__title">
                <div class="header__title-link-wrap">
                    <a href="" class="header__title-link">điện gia dụng</a>
                    <a href="" class="header__title-link">xe cộ</a>
                    <a href="" class="header__title-link">mẹ & bé</a>
                    <a href="" class="header__title-link">khoẻ đẹp</a>
                    <a href="" class="header__title-link">nhà cửa</a>
                    <a href="" class="header__title-link">sách</a>
                    <a href="" class="header__title-link">thể thao</a>
                </div>
                <div class="header__title-delivery-wrap">
                    <i class="header__title-delivery-icon fa-regular fa-location-dot"></i>
                    <h4 class="header__title-delivery-title">Giao đến:</h4>
                    <a href="" class="header__title-delivery-address">Bạn muốn giao hàng tới đâu?</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="header__commitment">
    <div class="grid flex">
        <span>Cam kết</span>
        <a href="" class="header__commitment-wrap">
            <i class="header__commitment-icon fa-solid fa-badge-check"></i>
            <span class="header__commitment-text">100% hàng thật</span>
        </a>
        <a href="" class="header__commitment-wrap">
            <i class="header__commitment-icon fa-solid fa-circle-dollar"></i>
            <span class="header__commitment-text">Hoàn 200% nếu hàng giả</span>
        </a>
        <a href="" class="header__commitment-wrap">
            <i class="header__commitment-icon fa-solid fa-box-heart"></i>
            <span class="header__commitment-text">30 ngày đổi trả</span>
        </a>
        <a href="" class="header__commitment-wrap">
            <i class="header__commitment-icon fa-regular fa-truck-arrow-right"></i>
            <span class="header__commitment-text">Giao nhanh 2h</span>
        </a>
        <a href="" class="header__commitment-wrap">
            <i class="header__commitment-icon header__commitment-icon-rotate  fa-solid fa-ballot-check"></i>
            <span class="header__commitment-text">Giá siêu rẻ</span>
        </a>
    </div>
</div>