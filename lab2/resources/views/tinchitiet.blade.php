<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tin->tieu_de }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: 40px auto; padding: 0 15px; }
        .news-detail { background-color: #fff; border-radius: 8px; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .news-title { font-size: 2rem; font-weight: bold; color: #007bff; margin-bottom: 15px; }
        .news-meta { font-size: 0.9rem; color: #888; margin-bottom: 20px; font-style: italic; }
        .news-content { font-size: 1.1rem; color: #333; margin-bottom: 20px; }
        .btn-back { display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; font-size: 0.9rem; margin-top: 20px; }
        .btn-back:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <div class="news-detail">
            <h1 class="news-title">{{ $tin->tieu_de }}</h1>
            <p class="news-meta">
                Thể loại: {{ $tin->ten_loai }} | 
                Lượt xem: {{ $tin->luot_xem }} | 
                Ngày đăng: {{ $tin->created_at }}
            </p>
            <div class="news-content">
                {!! nl2br(e($tin->noi_dung)) !!}
            </div>
            <a href="{{ url()->previous() }}" class="btn-back">Quay lại</a>
        </div>
    </div>
</body>
</html>