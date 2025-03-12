<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu Bản Thân</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
            backdrop-filter: blur(10px);
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
        }
        .highlight {
            color: #e74c3c;
            font-weight: 500;
        }
        .social-links {
            margin-top: 20px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            text-decoration: none;
            color: #3498db;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #e74c3c;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 5px solid #3498db;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Ảnh đại diện -->
        <img src="{{ asset('images/profile.jpg') }}" alt="Ảnh đại diện" class="profile-image">
        
        <!-- Tiêu đề -->
        <h1>Xin chào, tôi là <span class="highlight">Nguyễn Anh Đức</span></h1>
        
        <!-- Giới thiệu bản thân -->
        <p>
            Hiện tại tôi là <span class="highlight">Lập trình viên chuyên ngành lập trình Web</span> với niềm đam mê về 
            <span class="highlight">Tâm lý học và văn hóa Nhật Bản</span>. Tôi luôn nỗ lực học hỏi và phát triển 
            bản thân để mang lại những giá trị tốt nhất cho cộng đồng và công việc.
        </p>
        <p>
            Trong thời gian rảnh, tôi thích <span class="highlight">Xem Anime</span> và khám phá 
            những điều mới mẻ trong cuộc sống.
        </p>
        
        <!-- Liên kết mạng xã hội -->
        <div class="social-links">
            <a href="https://www.facebook.com/dancru299" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://github.com/DanCru" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
            <a href="mailto:nguyenanhduc2909@gmail.com" title="Email"><i class="fas fa-envelope"></i></a>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>
</html>