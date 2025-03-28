<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Xóa CSS của Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Giữ Font Awesome để hiển thị biểu tượng -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Thêm font Roboto (đồng bộ với VnExpress) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- CSS tùy chỉnh của bạn -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail-news.css') }}">
    <!-- Thêm CSS tùy chỉnh cho modal -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        /* CSS cho modal tùy chỉnh */
        .custom-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Nền mờ */
            z-index: 1000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .custom-modal.show {
            display: flex;
            opacity: 1;
        }
        .modal-content {
            background-color: #fff;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            padding: 20px;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        .custom-modal.show .modal-content {
            transform: scale(1);
        }
        .modal-header {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
        }
        .modal-header img {
            height: 40px;
            /* position: absolute; */
            margin: 10px auto;
        }
        .modal-title {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0;
        }
        .modal-close {
            position: absolute;
            right: 0;
            top: 10%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 25px;
            color: #666;
            cursor: pointer;
        }
        .modal-body {
            padding: 0;
        }
        .modal-body label {
            font-size: 14px;
            font-weight: 500;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }
        .modal-body input {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            font-size: 15px;
            color: #333;
            width: 100%;
            box-sizing: border-box;
        }
        .modal-body input:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 5px rgba(231, 76, 60, 0.3);
            outline: none;
        }
        .modal-body .btn-primary {
            background-color: #666;
            border: none;
            padding: 10px;
            font-size: 15px;
            font-weight: 500;
            border-radius: 5px;
            width: 100%;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .modal-body .btn-primary:hover {
            background-color: #555;
        }
        .social-login {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .social-login a {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            width: 23%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .social-login img {
            width: 20px;
            height: 20px;
        }
        .modal-footer-text {
            font-size: 12px;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }
        .modal-footer-text a {
            color: #e74c3c;
            text-decoration: none;
        }
        .modal-footer-text a:hover {
            text-decoration: underline;
        }
        .edit-icon {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            color: #666;
            font-size: 14px;
        }
        
        .mb-3 {
            margin-bottom: 15px;
            position: relative;
        }
        .text-center {
            text-align: center;
        }

        /* Định dạng thanh tìm kiếm */
.search-bar {
    display: flex;
    align-items: center;
    flex-grow: 1; /* Cho phép thanh tìm kiếm mở rộng để lấp đầy khoảng trống */
    max-width: 400px; /* Giới hạn chiều rộng tối đa */
    margin: 0 20px; /* Khoảng cách với menu-list và menu-list2 */
}

.search-bar form {
    display: flex;
    width: 100%;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 8px 40px 8px 15px; /* Để lại khoảng trống bên phải cho nút tìm kiếm */
    border: 1px solid #ddd;
    border-radius: 20px;
    font-size: 14px;
    font-family: 'Roboto', sans-serif;
    outline: none;
    transition: border-color 0.3s ease;
}

.search-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

.search-button {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px 10px;
    color: #666;
}

.search-button i {
    font-size: 16px;
}

.search-button:hover i {
    color: #007bff;
}
    </style>
</head>

<body>
    @php
        $user = Auth::user();
    @endphp
    <div class="thanhtacvu">
        <div class="boc-header">
            <div class="header">
                <div class="header1">
                    <div class="logo">
                        <a href="{{ route('news.home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                    <div class="date-today">
                        <p>Thứ hai, 27/5/2024</p>
                    </div>
                    <div class="my-city">Thanh Hóa</div>
                </div>
                <div class="header2">
                    <p class="moinhat">Mới nhất</p>
                    <p>Tin theo khu vực</p>
                    <p class="logo2"><img src="{{ asset('img/logo2.png') }}" alt=""> International</p>
                    <a href=""><i class="fa-regular fa-user"></i></a>
                    {{-- @if ($user)
                        <a href="{{ route('logout') }}">
                            <p class="dangnhap">Đăng xuất</p>                        
                        </a>
                    @else
                        <a href="{{ route('signin') }}">
                            <p class="dangnhap">Đăng nhập</p>                        
                        </a>
                    @endif --}}
                    <i class="fa-regular fa-bell"></i>
                </div>
            </div>
        </div>
        <nav class="nav-dinhcao">
            <ul class="menu-list">
                <a href="{{ route('news.home') }}">
                    <li><i class="fa-solid fa-house"></i></li>
                </a>
                <a href="{{ route('news.home') }}">
                    <li>Tin mới nhất</li>
                </a>
                @foreach ($categories as $item)
                    <a href="{{ route('news.category' , $item->id) }}">
                        <li>{{ $item->name }}</li>
                    </a>
                @endforeach
                
                
                
                

            </ul>
            <!-- Thanh tìm kiếm -->
            <div class="search-bar">
                <form action="{{ route('news.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Tìm kiếm..." class="search-input">
                    <button type="submit" class="search-button">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <ul class="menu-list2">
                @if (Auth::check())
                    <li class="nav-item"><span class="nav-link">Xin chào, {{ Auth::user()->name }}</span></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a></li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="authModal">Đăng nhập</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    
    @yield('home')
    @yield('detail')
    @yield('content-search')
    <div class="hr_to"></div>
    <div class="container-footer">
        <footer>
            <div class="footer1st">
                <div class="boc-footer1">
                    <div class="column1">
                        <ul class="list-menu-footer1">
                            <a href="">
                                <li>Trang chủ</li>
                            </a>
                            <a href="">
                                <li>Video</li>
                            </a>
                            <a href="">
                                <li>Podcast</li>
                            </a>
                            <a href="">
                                <li>Ảnh</li>
                            </a>
                            <a href="">
                                <li>Infographics</li>
                            </a>
                            <hr class="hr-footer">
                            <a href="">
                                <li>Mới nhất</li>
                            </a>
                            <a href="">
                                <li>Xem nhiều</li>
                            </a>
                            <a href="">
                                <li>Tin nóng</li>
                            </a>
                        </ul>
                    </div>
                    <div class="column2">
                        <ul class="list-menu-footer1">
                            <a href="">
                                <li>Thời sự</li>
                            </a>
                            <a href="">
                                <li>Góc nhìn</li>
                            </a>
                            <a href="">
                                <li>Thế giới</li>
                            </a>
                            <a href="">
                                <li>Kinh doanh</li>
                            </a>
                            <a href="">
                                <li>Bất động sản</li>
                            </a>
                            <a href="">
                                <li>Giải trí</li>
                            </a>
                        </ul>
                    </div>
                    <div class="column3">
                        <ul class="list-menu-footer1">
                            <a href="">
                                <li>Thể thoa</li>
                            </a>
                            <a href="">
                                <li>Pháp luật</li>
                            </a>
                            <a href="">
                                <li>Giáo dục</li>
                            </a>
                            <a href="">
                                <li>Sức khỏe</li>
                            </a>
                            <a href="">
                                <li>Đời sống</li>
                            </a>
                            <a href="">
                                <li>Du lịch</li>
                            </a>
                        </ul>
                    </div>
                    <div class="column4">
                        <ul class="list-menu-footer1">
                            <a href="">
                                <li>Khoa học</li>
                            </a>
                            <a href="">
                                <li>Xe</li>
                            </a>
                            <a href="">
                                <li>Số hóa</li>
                            </a>
                            <a href="">
                                <li>Ý kiến</li>
                            </a>
                            <a href="">
                                <li>Tâm sự</li>
                            </a>
                            <a href="">
                                <li>Thư giãn</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="boc-footer2">
                    <ul class="list-menu-footer1">
                        <a href="">
                            <li>Rao vặt</li>
                        </a>
                        <a href="">
                            <li>Startup</li>
                        </a>
                        <a href="">
                            <li>Mua ảnh VnDaily</li>
                        </a>
                    </ul>
                </div>
                <div class="boc-footer3">
                    <p class="title-foot">Tải ứng dụng</p>
                    <div class="haicailogoo">
                        <div class="logo-footer">
                            <a href="/admin"><img src="{{ asset('img/logo2.png') }}" alt="">VnDaily</a>
                        </div>
                        <div class="logo-footer">
                            <a href=""><img src="{{ asset('img/logo2.png') }}" alt="">International</a>
                        </div>
                    </div>
                    <p class="title-foot">Liên hệ</p>
                    <div class="lienhe-footer">
                        <p><i class="fa-regular fa-envelope"></i> Tòa soạn</p>
                        <p><i class="fa-regular fa-comments"></i> Quảng cáo</p>
                        <p><i class="fa-regular fa-bookmark"></i> Hợp tác bản quyền</p>
                    </div>
                    <hr class="hr-footer">
                    <p class="title-foot">Đường dây nóng</p>
                    <div class="duongdaynong">
                        <div class="dgdaynong">
                            <p><strong>0822 153 447</strong></p>
                            <p class="tinhthanh-footer">(Hà Nội)</p>
                        </div>
                        <div class="dgdaynong">
                            <p><strong>0822 153 447</strong></p>
                            <p class="tinhthanh-footer">(TP Hồ Chí Minh)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer2nd">
                <span>Báo điện tử <img style="width: 100px; margin-left: 8px" src="{{ asset('img/logo.png') }}"
                        alt=""></span>
                <span>Điều khoản sử dụng</span>
                <span>Chính sách bảo mật</span>
                <span>Cookies</span>
                <span>RSS</span>
                <span>Theo dõi VnDaily trên <i class="fa-brands fa-facebook"></i> <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-twitter"></i></span>
            </div>
            <div class="footer3rd">
                <p>
                    <span style="font-weight: 600;">Báo tiếng Việt nhiều người xem nhất</span> <br>
                    Thuộc Bộ Khoa học và Công nghệ <br>
                    Số giấy phép: 548/GP-BTTTT ngày 24/08/2021 <br>
                </p>
                <p>Tổng biên tập: Anh Đức <br>
                    Địa chỉ: Tầng 10, Tòa A FPT Tower, số 10 Phạm Văn Bạch, Dịch <br> Vọng, Cầu Giấy, Hà Nội <br>
                    Điện thoại: 024 7300 8899 - máy lẻ 4500</p>
                <p>© 1997-2024. Toàn bộ bản quyền thuộc VnDaily</p>
            </div>

        </footer>
    </div>
    <!-- Popup (Modal) -->
    <div class="custom-modal" id="authModal">
        <div class="modal-content">
            <div class="modal-header">
                <img  src="{{ asset('img/logo.png') }}" alt="VnDaily">
                <h5 class="modal-title" style="display: block" id="authModalLabel">Đăng nhập / Tạo tài khoản</h5>
                <button type="button" class="modal-close" id="modalClose">&times;</button>
            </div>
        <div class="modal-body">
            <!-- Form nhập email -->
            <div id="errorMessage" style="display: none; color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 15px;"></div>
            <div id="emailForm">
                <div class="mb-3">
                    <label for="emailInput">Email</label>
                    <input type="email" id="emailInput" placeholder="Nhập Email của bạn" required>
                </div>
                <button type="button" class="btn-primary" id="continueBtn">Tiếp tục</button>
            </div>

            <!-- Form tạo tài khoản (ẩn ban đầu) -->
            <div id="signupForm" style="display: none;">
                <p class="text-center">Bạn chưa có tài khoản trên VnDaily, vui lòng tạo mật khẩu để truy cập</p>
                <div class="mb-3 position-relative">
                    <label for="signupEmail">Email</label>
                    <input type="email" id="signupEmail" readonly>
                    <i class="fas fa-edit edit-icon"></i>
                </div>
                <div class="mb-3 position-relative">
                    <label for="signupPassword">Mật khẩu</label>
                    <input type="password" id="signupPassword" placeholder="Mật khẩu">
                </div>
                <button type="button" class="btn-primary" id="signupBtn">Tạo tài khoản</button>
            </div>

            <!-- Form đăng nhập (ẩn ban đầu) -->
            <div id="signinForm" style="display: none;">
                <div class="mb-3 position-relative">
                    <label for="signinEmail">Email</label>
                    <input type="email" id="signinEmail" readonly>
                    <i class="fas fa-edit edit-icon"></i>
                </div>
                <div class="mb-3 position-relative">
                    <label for="signinPassword">Mật khẩu</label>
                    <input type="password" id="signinPassword" placeholder="Mật khẩu">
                    <i class="fas fa-eye password-toggle" id="toggleSigninPassword"></i>
                </div>
                <a href="{{ route('password.request') }}" class="d-block text-end mb-3" style="font-size: 14px; color: #e74c3c;">Quên mật khẩu?</a>
                <button type="button" class="btn-primary" id="signinBtn">Đăng nhập</button>
            </div>

            <!-- Nút đăng nhập bằng mạng xã hội -->
            <div class="social-login">
                <a href="#"><img src="https://i.pinimg.com/736x/74/65/f3/7465f30319191e2729668875e7a557f2.jpg" alt="Google"></a>
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook"></a>
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple"></a>
            </div>
        </div>
        <div class="modal-footer-text">
            Tiếp tục là đồng ý với <a href="#">điều khoản sử dụng</a> và <a href="#">chính sách bảo mật</a> của VnDaily. Tài khoản của bạn được <a href="#">reCAPTCHA</a> bảo vệ.
        </div>
    </div>
</div>
</body>

<script>
    const authModal = document.getElementById('authModal');
    const modalClose = document.getElementById('modalClose');
    const loginLink = document.querySelector('a[data-target="authModal"]');
    const errorMessage = document.getElementById('errorMessage');

    // Hiển thị modal khi bấm "Đăng nhập"
    loginLink.addEventListener('click', (e) => {
        e.preventDefault();
        errorMessage.style.display = 'none'; // Ẩn thông báo lỗi khi mở modal
        authModal.classList.add('show');
    });

    // Ẩn modal khi bấm nút đóng
    modalClose.addEventListener('click', () => {
        authModal.classList.remove('show');
    });

    // Ẩn modal khi bấm ra ngoài modal
    authModal.addEventListener('click', (e) => {
        if (e.target === authModal) {
            authModal.classList.remove('show');
        }
    });

    const emailForm = document.getElementById('emailForm');
    const signupForm = document.getElementById('signupForm');
    const signinForm = document.getElementById('signinForm');
    const emailInput = document.getElementById('emailInput');
    const signupEmail = document.getElementById('signupEmail');
    const signinEmail = document.getElementById('signinEmail');
    const signupPassword = document.getElementById('signupPassword');
    const signinPassword = document.getElementById('signinPassword');
    const continueBtn = document.getElementById('continueBtn');
    const signupBtn = document.getElementById('signupBtn');
    const signinBtn = document.getElementById('signinBtn');
    const toggleSignupPassword = document.getElementById('toggleSignupPassword');
    const toggleSigninPassword = document.getElementById('toggleSigninPassword');
    const modalTitle = document.getElementById('authModalLabel');

    // Xử lý nút "Tiếp tục"
    continueBtn.addEventListener('click', () => {
        const email = emailInput.value.trim();
        if (!email) {
            errorMessage.innerHTML = 'Vui lòng nhập email!';
            errorMessage.style.display = 'block';
            return;
        }

        continueBtn.innerHTML = 'Đang xử lý...';
        continueBtn.disabled = true;
        errorMessage.style.display = 'none';

        // Gửi AJAX để kiểm tra email
        fetch('/check-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.exists) {
                // Email đã tồn tại -> Hiển thị form đăng nhập
                emailForm.style.display = 'none';
                signinForm.style.display = 'block';
                signupForm.style.display = 'none';
                signinEmail.value = email;
                modalTitle.textContent = 'Đăng nhập';
            } else {
                // Email chưa tồn tại -> Hiển thị form tạo tài khoản
                emailForm.style.display = 'none';
                signupForm.style.display = 'block';
                signinForm.style.display = 'none';
                signupEmail.value = email;
                modalTitle.textContent = 'Tạo tài khoản';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorMessage.innerHTML = 'Đã có lỗi xảy ra: ' + error.message;
            errorMessage.style.display = 'block';
        })
        .finally(() => {
            continueBtn.innerHTML = 'Tiếp tục';
            continueBtn.disabled = false;
        });
    });

    // Xử lý nút chỉnh sửa email
    document.querySelectorAll('.edit-icon').forEach(icon => {
        icon.addEventListener('click', () => {
            emailForm.style.display = 'block';
            signupForm.style.display = 'none';
            signinForm.style.display = 'none';
            modalTitle.textContent = 'Đăng nhập / Tạo tài khoản';
            emailInput.value = signupEmail.value || signinEmail.value;
            errorMessage.style.display = 'none';
        });
    });

    // Xử lý nút "Tạo tài khoản"
    signupBtn.addEventListener('click', () => {
        const email = signupEmail.value;
        const password = signupPassword.value;
        if (!password) {
            errorMessage.innerHTML = 'Vui lòng nhập mật khẩu!';
            errorMessage.style.display = 'block';
            return;
        }

        signupBtn.innerHTML = 'Đang xử lý...';
        signupBtn.disabled = true;
        errorMessage.style.display = 'none';

        // Gửi AJAX để tạo tài khoản
        fetch('/signup', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email, password: password })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route("news.home") }}';
            } else {
                errorMessage.innerHTML = data.message || 'Đã có lỗi xảy ra, vui lòng thử lại!';
                errorMessage.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorMessage.innerHTML = 'Đã có lỗi xảy ra: ' + error.message;
            errorMessage.style.display = 'block';
        })
        .finally(() => {
            signupBtn.innerHTML = 'Tạo tài khoản';
            signupBtn.disabled = false;
        });
    });

    // Xử lý nút "Đăng nhập"
    signinBtn.addEventListener('click', () => {
        const email = signinEmail.value;
        const password = signinPassword.value;
        if (!password) {
            errorMessage.innerHTML = 'Vui lòng nhập mật khẩu!';
            errorMessage.style.display = 'block';
            return;
        }

        signinBtn.innerHTML = 'Đang xử lý...';
        signinBtn.disabled = true;
        errorMessage.style.display = 'none';

        // Gửi AJAX để đăng nhập
        fetch('/signin', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email, password: password })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route("news.home") }}';
            } else {
                errorMessage.innerHTML = data.message || 'Email hoặc mật khẩu không đúng!';
                errorMessage.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorMessage.innerHTML = 'Đã có lỗi xảy ra: ' + error.message;
            errorMessage.style.display = 'block';
        })
        .finally(() => {
            signinBtn.innerHTML = 'Đăng nhập';
            signinBtn.disabled = false;
        });
    });

    // Xử lý toggle hiển thị mật khẩu
    toggleSignupPassword.addEventListener('click', () => {
        const type = signupPassword.type === 'password' ? 'text' : 'password';
        signupPassword.type = type;
        toggleSignupPassword.classList.toggle('fa-eye');
        toggleSignupPassword.classList.toggle('fa-eye-slash');
    });

    toggleSigninPassword.addEventListener('click', () => {
        const type = signinPassword.type === 'password' ? 'text' : 'password';
        signinPassword.type = type;
        toggleSigninPassword.classList.toggle('fa-eye');
        toggleSigninPassword.classList.toggle('fa-eye-slash');
    });
</script>