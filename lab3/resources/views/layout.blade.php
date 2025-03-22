<head>
        <title>@yield('tieudetrang')</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }
    
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }
    
            header {
                padding: 20px 0;
                border-bottom: 1px solid #e0e0e0;
            }
    
            .search-bar {
                display: flex;
                align-items: center;
                max-width: 700px;
                margin: 0 auto;
                border: 1px solid #dfe1e5;
                border-radius: 24px;
                padding: 10px 20px;
                box-shadow: 0 1px 6px rgba(32,33,36,0.1);
            }
    
            .search-bar input {
                flex-grow: 1;
                border: none;
                outline: none;
                font-size: 16px;
            }
    
            .search-bar i {
                color: #5f6368;
                margin-right: 10px;
            }
    
            nav {
                height: 50px;
                display: flex;
                border-bottom: 1px solid #e0e0e0;
                align-items: center;
                align-content: center;
            }
    
            nav ul {
                list-style: none;
                display: flex;
                gap: 20px;
                align-content: center;
                margin-bottom: 0;
            }
    
            nav ul li a {
                text-decoration: none;
                color: #1a0dab;
                font-size: 14px;
            }
    
            nav ul li a:hover {
                text-decoration: underline;
            }
    
            main {
                display: flex;
                min-height: 500px;
            }
    
            article {
                flex: 0 0 65%;
                padding: 20px 0;
            }
    
            .result {
                margin-bottom: 25px;
            }
    
            .result a {
                color: #1a0dab;
                text-decoration: none;
                font-size: 18px;
            }
    
            .result a:hover {
                text-decoration: underline;
            }
    
            .result .url {
                color: #006621;
                font-size: 14px;
                margin: 2px 0;
            }
    
            .result p {
                color: #545454;
                font-size: 14px;
                line-height: 1.4;
            }
    
            aside {
                flex: 0 0 35%;
                padding: 20px;
                color: #333;
            }
    
            .related-searches {
                border: 1px solid #dfe1e5;
                padding: 15px;
                border-radius: 8px;
            }
    
            .related-searches h3 {
                font-size: 16px;
                margin-bottom: 10px;
            }
    
            .related-searches ul {
                list-style: none;
            }
    
            .related-searches ul li {
                margin: 8px 0;
            }
    
            .related-searches ul li a {
                color: #1a0dab;
                text-decoration: none;
            }
    
            .related-searches ul li a:hover {
                text-decoration: underline;
            }
    
            footer {
                background: #f2f2f2;
                padding: 20px;
                color: #70757a;
                font-size: 14px;
                text-align: center;
                border-top: 1px solid #dadce0;
            }
    
            @media (max-width: 768px) {
                main {
                    flex-direction: column;
                }
                article, aside {
                    flex: 0 0 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" value="Từ khóa tìm kiếm" readonly>
                </div>
            </header>
            <nav>
                <ul>
                    <li><a href="{{ route('trangchu') }}">Tất cả</a></li>
                    <li><a href="#">Hình ảnh</a></li>
                    <li><a href="#">Video</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Thêm</a></li>
                </ul>
            </nav>
            <main>
                <article>
                    @yield('noidungchinh')

                    
                </article>
                <aside>
                    <div class="related-searches">
                        <h3>Tìm kiếm loại tin</h3>
                        <ul>
                            @foreach ($tintrongloai as $item)
                                <li><a href="{{ route('tintrongloai', $item->id) }}">{{ $item->ten_loai }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </main>
            <footer>
                <p>© Coppy</p>
            </footer>
        </div>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </body>