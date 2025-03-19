<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Mới Nhất</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; background-color: #f4f4f4; }
        .container { max-width: 1200px; margin: 40px auto; padding: 0 15px; }
        h1 { text-align: center; font-size: 2.5rem; color: #333; margin-bottom: 40px; border-bottom: 3px solid #007bff; display: inline-block; padding-bottom: 10px; }
        .news-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; }
        .news-column { width: 100%; }
        .news-card { background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .news-card:hover { transform: translateY(-5px); box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); }
        .news-title { font-size: 1.3rem; font-weight: bold; color: #007bff; margin-bottom: 10px; line-height: 1.4; }
        .news-content { font-size: 1rem; color: #555; margin-bottom: 10px; }
        .news-category { font-size: 0.9rem; color: #888; margin-bottom: 5px; font-style: italic; }
        .news-views { font-size: 0.9rem; color: #888; font-style: italic; }
        @media (max-width: 768px) { .news-grid { grid-template-columns: 1fr; } }
        @media (max-width: 480px) { .news-card { padding: 15px; } .news-title { font-size: 1.1rem; } .news-content { font-size: 0.9rem; } }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tin Mới Nhất</h1>
        <div class="news-grid">
            @foreach($tin as $item)
                <div class="news-column">
                    <div class="news-card">
                        <p class="news-category">Thể loại: {{ $item->ten_the_loai ?? 'Chưa có thể loại' }}</p>
                        <h2 class="news-title">{{ $item->tieu_de }}</h2>
                        <p class="news-content">{{ Str::limit($item->noi_dung, 100) }}</p>
                        <p class="news-views">Lượt xem: {{ $item->luot_xem }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>