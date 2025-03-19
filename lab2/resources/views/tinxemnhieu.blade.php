<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Xem Nhiều Nhất</title>
    <style>
        /* CSS cơ bản */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        /* Container chính */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 15px;
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        /* Bố cục 3 cột */
        .news-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Khoảng cách giữa các cột */
        }

        .news-column {
            flex: 1 1 calc(33.33% - 20px); /* Chia đều 3 cột, trừ khoảng cách */
            min-width: 300px; /* Đảm bảo cột không quá nhỏ trên màn hình nhỏ */
        }

        /* Thẻ tin tức */
        .news-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .news-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-content {
            font-size: 1rem;
            color: #333;
            margin-bottom: 10px;
        }

        .news-views {
            color: #888;
            font-size: 0.9rem;
        }

        /* Responsive cho màn hình nhỏ */
        @media (max-width: 768px) {
            .news-column {
                flex: 1 1 100%; /* Chuyển thành 1 cột trên mobile */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tin Tức Được Xem Nhiều Nhất</h1>
        <div class="news-grid">
            @foreach($tin as $item)
                <div class="news-column">
                    <div class="news-card">
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