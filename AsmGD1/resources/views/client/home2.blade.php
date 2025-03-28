<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .news-card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .news-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .news-card h5 {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 10px 0;
        }
        .news-card p {
            font-size: 14px;
            color: #666;
        }
        .category-label {
            font-size: 12px;
            color: #e74c3c;
            font-weight: 500;
            text-transform: uppercase;
        }
        /* Popup styles */
        .modal-content {
            border-radius: 8px;
            padding: 20px;
            border: none;
        }
        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }
        .modal-header .btn-close {
            font-size: 14px;
        }
        .modal-title {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a1a;
            text-align: center;
            width: 100%;
        }
        .modal-body {
            padding-top: 0;
        }
        .modal-body label {
            font-size: 14px;
            font-weight: 500;
            color: #666;
            margin-bottom: 5px;
        }
        .modal-body input {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            font-size: 15px;
            color: #333;
            width: 100%;
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
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 14px;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('news.home') }}">
                <img src="https://s1.vnecdn.net/vnexpress/restruct/i/v391/v2_2019/pc/graphics/logo.svg" alt="VnExpress" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Tin mới nhất</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Xã hội</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Thời sự</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kinh doanh</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @if (Auth::check())
                        <li class="nav-item"><span class="nav-link">Xin chào, {{ Auth::user()->name }}</span></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a></li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#authModal">Đăng nhập</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('signup') }}">Đăng ký</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung trang tin tức -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Nội dung chính -->
            <div class="col-lg-8">
                <div class="news-card mb-4">
                    <img src="https://via.placeholder.com/800x400" alt="News">
                    <div class="p-3">
                        <span class="category-label">Kinh doanh</span>
                        <h5>Thu tuong de nghi Skoda xay he sinh thai cong nghiep o tai Viet Nam</h5>
                        <p>Thu tuong Pham Minh Chinh de nghi Skoda Auto xem xet mo rong san xuat...</p>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="news-card mb-4">
                    <div class="p-3">
                        <h5>Tong thong Tho Nhi Ky tham tru so dang doi lap dau tien sau 18 nam</h5>
                        <p>2025-03-28</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup (Modal) -->
    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://s1.vnecdn.net/vnexpress/restruct/i/v391/v2_2019/pc/graphics/logo.svg" alt="VnExpress" style="height: 30px; position: absolute; left: 20px;">
                    <h5 class="modal-title" id="authModalLabel">Đăng nhập / Tạo tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form nhập email -->
                    <div id="emailForm">
                        <div class="mb-3">
                            <label for="emailInput">Email</label>
                            <input type="email" id="emailInput" class="form-control" placeholder="Nhập Email của bạn" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="continueBtn">Tiếp tục</button>
                    </div>

                    <!-- Form tạo tài khoản (ẩn ban đầu) -->
                    <div id="signupForm" style="display: none;">
                        <p class="text-center">Bạn chưa có tài khoản trên VnExpress, vui lòng tạo mật khẩu để truy cập</p>
                        <div class="mb-3 position-relative">
                            <label for="signupEmail">Email</label>
                            <input type="email" id="signupEmail" class="form-control" readonly>
                            <i class="fas fa-edit edit-icon"></i>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="signupPassword">Mật khẩu</label>
                            <input type="password" id="signupPassword" class="form-control" placeholder="Mật khẩu">
                            <i class="fas fa-eye password-toggle" id="toggleSignupPassword"></i>
                        </div>
                        <button type="button" class="btn btn-primary" id="signupBtn">Tạo tài khoản</button>
                    </div>

                    <!-- Form đăng nhập (ẩn ban đầu) -->
                    <div id="signinForm" style="display: none;">
                        <div class="mb-3 position-relative">
                            <label for="signinEmail">Email</label>
                            <input type="email" id="signinEmail" class="form-control" readonly>
                            <i class="fas fa-edit edit-icon"></i>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="signinPassword">Mật khẩu</label>
                            <input type="password" id="signinPassword" class="form-control" placeholder="Mật khẩu">
                            <i class="fas fa-eye password-toggle" id="toggleSigninPassword"></i>
                        </div>
                        <button type="button" class="btn btn-primary" id="signinBtn">Đăng nhập</button>
                    </div>

                    <!-- Nút đăng nhập bằng mạng xã hội -->
                    <div class="social-login">
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/4/4a/Logo_2013_Google.png" alt="Google"></a>
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook"></a>
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple"></a>
                    </div>
                </div>
                <div class="modal-footer-text">
                    Tiếp tục là đồng ý với <a href="#">điều khoản sử dụng</a> và <a href="#">chính sách bảo mật</a> của VnExpress. Tài khoản của bạn được <a href="#">reCAPTCHA</a> bảo vệ.
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS và JavaScript xử lý popup -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
                alert('Vui lòng nhập email!');
                return;
            }

            // Gửi AJAX để kiểm tra email
            fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
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
                alert('Đã có lỗi xảy ra, vui lòng thử lại!');
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
            });
        });

        // Xử lý nút "Tạo tài khoản"
        signupBtn.addEventListener('click', () => {
            const email = signupEmail.value;
            const password = signupPassword.value;
            if (!password) {
                alert('Vui lòng nhập mật khẩu!');
                return;
            }

            // Gửi AJAX để tạo tài khoản
            fetch('/signup', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email, password: password })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '{{ route("news.home") }}';
                } else {
                    alert(data.message || 'Đã có lỗi xảy ra, vui lòng thử lại!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Đã có lỗi xảy ra, vui lòng thử lại!');
            });
        });

        // Xử lý nút "Đăng nhập"
        signinBtn.addEventListener('click', () => {
            const email = signinEmail.value;
            const password = signinPassword.value;
            if (!password) {
                alert('Vui lòng nhập mật khẩu!');
                return;
            }

            // Gửi AJAX để đăng nhập
            fetch('/signin', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email, password: password })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '{{ route("news.home") }}';
                } else {
                    alert(data.message || 'Email hoặc mật khẩu không đúng!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Đã có lỗi xảy ra, vui lòng thử lại!');
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
</body>
</html>