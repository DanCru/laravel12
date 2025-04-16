@extends('client/layoutClient')

@section('title')
    Home Page
@endsection

@section('home')
<div class="container">
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Bài viết chính -->
        @if ($featuredNews)
            <div class="article-card article-card--featured">
                <div class="article-card__thumbnail">
                    <img src="{{ asset('storage/'. $featuredNews->thumbnail ) }}" alt="{{ $featuredNews->title }}">
                </div>
                <div class="article-card__content">
                    <a href="{{ route('news.detail', $featuredNews->id) }}"><h2 class="article-card__title">{{ $featuredNews->title }}</h2></a>
                    <p class="article-card__excerpt">{{ $featuredNews->excerpt }}</p>
                    <div class="article-card__meta">
                        <span class="article-card__category">{{ $featuredNews->category ? $featuredNews->category->name : 'Không có danh mục' }}</span>
                        <span class="article-card__date">{{ $featuredNews->published_at }}</span>
                    </div>
                </div>
            </div>
        @endif

        <!-- Danh sách bài viết phụ (dạng lưới) -->
        <div class="article-grid">
            @foreach ($recentNews as $news)
                <div class="article-card article-card--small">
                    <div class="article-card__thumbnail">
                        <img src="{{ asset('storage/'. $news->thumbnail) }}" alt="{{ $news->title }}">
                    </div>
                    <div class="article-card__content">
                        <a href="{{ route('news.detail', $news->id) }}"><h3 class="article-card__title">{{ $news->title }}</h3></a>
                        <div class="article-card__meta">
                            <span class="article-card__category">{{ $news->category->name  }}</span>
                            <span class="article-card__date">{{ $news->published_at }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Danh sách bài viết ngắn -->
        <div class="sidebar__section">
            <h3 class="sidebar__title">Tin nổi bật</h3>
            <ul class="sidebar__list">
                @foreach ($sidebarNews as $news)
                    <li class="sidebar__item">
                        <a href="{{ route('news.detail', $news->id) }}" class="sidebar__link">{{ $news->title }}</a>
                        <span class="sidebar__date">{{ $news->published_at }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Widget thời tiết -->
        <div class="sidebar__section sidebar__weather">
            <h3 class="sidebar__title">Thời tiết hôm nay</h3>
            <div class="weather-widget">
                <div class="weather-widget__icon">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="weather-widget__info">
                    <p class="weather-widget__city">Hà Nội</p>
                    <p class="weather-widget__temp">28°C</p>
                    <p class="weather-widget__condition">Nắng nhẹ</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Phần 1: Khoa học công nghệ -->
<div class="section section--tech">
    <div class="container2">
        <div class="section__header">
            <h2 class="section__title">Khoa học công nghệ</h2>
            <div class="section__tabs">
                <a href="#" class="section__tab section__tab--active">Đời sống sáng tạo</a>
                <a href="#" class="section__tab">Chuyện đời số</a>
                <a href="#" class="section__tab">Hoạt động Bộ KH&CN</a>
            </div>
        </div>
        <div class="section__content">
            <div class="section__main">
                @if ($techNews->isNotEmpty())
                    <div class="article article--main">
                        <div class="article__thumbnail">
                            <img src="{{ asset('storage/'. $techNews[0]->thumbnail) }}" alt="{{ $techNews[0]->title }}">
                        </div>
                        <h3 class="article__title">{{ $techNews[0]->title }}</h3>
                        <p class="article__excerpt">{{ $techNews[0]->excerpt }}</p>
                    </div>
                @endif
            </div>
            <div class="section__side">
                @foreach ($techNews->slice(1) as $news)
                    <div class="article article--side">
                        <h3 class="article__title">{{ $news->title }}</h3>
                        @if ($loop->first)
                            <div class="article__thumbnail">
                                <img src="{{ asset('storage/'. $news->thumbnail)  }}" alt="{{ $news->title }}">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="section__list">
            <ul class="article-list">
                @foreach ($techNews->slice(1) as $news)
                    <li class="article-list__item">
                        <a href="#">{{ $news->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Phần 2: Kinh doanh -->
<div class="section section--business">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Kinh doanh</h2>
            <div class="section__tabs">
                <a href="#" class="section__tab section__tab--active">Quốc tế</a>
                <a href="#" class="section__tab">Doanh nghiệp</a>
                <a href="#" class="section__tab">Hàng hóa</a>
                <a href="#" class="section__tab">Vĩ mô</a>
                <a href="#" class="section__tab">Ebank</a>
            </div>
        </div>
        <div class="section__content">
            <div class="section__main">
                @if ($businessNews->isNotEmpty())
                    <div class="article article--main">
                        <div class="article__thumbnail">
                            <img src="{{ asset('storage/'. $businessNews[0]->thumbnail) }}" alt="{{ $businessNews[0]->title }}">
                        </div>
                        <h3 class="article__title">{{ $businessNews[0]->title }}</h3>
                        <p class="article__excerpt">{{ $businessNews[0]->excerpt }}</p>
                    </div>
                @endif
            </div>
            <div class="section__side">
                @foreach ($businessNews->slice(1) as $news)
                    <div class="article article--side">
                        <h3 class="article__title">{{ $news->title }}</h3>
                        @if ($loop->first)
                            <p class="article__excerpt">{{ $news->excerpt }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="section__list">
            <ul class="article-list">
                @foreach ($businessNews->slice(1) as $news)
                    <li class="article-list__item">
                        <a href="#">{{ $news->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    // JavaScript để lấy dữ liệu thời tiết (đã có từ trước)
    const apiKey = "YOUR_API_KEY";
    const city = "Hanoi";

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`)
        .then(response => response.json())
        .then(data => {
            document.querySelector('.weather-widget__city').textContent = data.name;
            document.querySelector('.weather-widget__temp').textContent = `${Math.round(data.main.temp)}°C`;
            document.querySelector('.weather-widget__condition').textContent = data.weather[0].description;

            const weatherIcon = document.querySelector('.weather-widget__icon i');
            const weatherCondition = data.weather[0].main.toLowerCase();
            if (weatherCondition.includes('cloud')) {
                weatherIcon.className = 'fas fa-cloud';
            } else if (weatherCondition.includes('rain')) {
                weatherIcon.className = 'fas fa-cloud-rain';
            } else if (weatherCondition.includes('sun') || weatherCondition.includes('clear')) {
                weatherIcon.className = 'fas fa-sun';
            }
        })
        .catch(error => {
            console.error('Lỗi khi lấy dữ liệu thời tiết:', error);
            document.querySelector('.weather-widget__info').textContent = 'Không thể tải dữ liệu thời tiết';
        });
</script>

@endsection
