@extends('client/layoutClient')

@section('title')
    Detail Page
@endsection

@section('detail')
<!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.index') }}">Tin tức</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Danh sách tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.create') }}">Thêm tin tức</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <!-- Nội dung chính -->
    <div class="container">
        <div class="row">
            <!-- Nội dung bài viết -->
            <div class="main-content">
                <div class="col-lg-8">
                    <div class="news-detail">
                        <div class="news-detail__meta">
                            <span><strong>Thời sự</strong></span>
                            <span>{{ $news->published_at ? $news->published_at : 'Chưa xuất bản' }} (GMT+7)</span>
                        </div>
    
                        <h1 class="news-detail__title">{{ $news->title }}</h1>
    
                        @if ($news->excerpt)
                            <div class="news-detail__excerpt">
                                {{ $news->excerpt }}
                            </div>
                        @endif
    
                        <div class="news-detail__content">
                            @if ($news->thumbnail)
                                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
                                <div class="caption">{{ $news->title }}</div>
                            @endif
    
                            @if ($news->content)
                                <div>{!! nl2br(e($news->content)) !!}</div>
                            @else
                                <p>Không có nội dung.</p>
                            @endif
                        </div>
    
                        <!-- Nút hành động -->
                        <div class="mt-4 d-flex gap-2">
                            <a href="{{ route('news.home') }}" class="btn btn-secondary btn-custom">Quay lại</a>
                            {{-- <a href="{{ route('admin.edit', $news->id) }}" class="btn btn-warning btn-custom">Sửa</a>
                            <form action="{{ route('admin.destroy', $news->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-custom" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form> --}}
                        </div>
    
                        <!-- Phần ý kiến -->
                        <div class="comments-section">
                            <h3>Ý kiến (6)</h3>
                            <ul class="nav comments-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Quan tâm nhất</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Mới nhất</a>
                                </li>
                            </ul>
    
                            <!-- Danh sách bình luận -->
                            <div class="comments-list">
                                <div class="comment">
                                    <div class="comment__avatar">M</div>
                                    <div class="comment__content">
                                        <p><strong>Mr Duc</strong> Với tư cách là 1 một người bận rộn, phần này chỉ là tĩnh, khỏi thử cmt.</p>
                                        <div class="comment__meta">2h trước</div>
                                        <div class="comment__actions">
                                            <a href="#"><i class="bi bi-hand-thumbs-up"></i> Thích <span class="like-count">43</span></a>
                                            <a href="#">Trả lời</a>
                                        </div>
                                    </div>
                                </div>
    
                                
                            </div>
    
                            <!-- Form nhập bình luận -->
                            <div class="comment-form">
                                <form action="#" method="POST">
                                    @csrf
                                    <textarea name="comment" placeholder="Chia sẻ ý kiến của bạn" required></textarea>
                                    <button type="submit">Gửi ý kiến</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            {{-- <div class="col-lg-4"> --}}
                <div class="sidebar">
                    <!-- Quảng cáo -->
                    <div class="sidebar__item-detail">
                        <a href="#">
                            <img class="adv" src="{{ asset('img/giphy.gif') }}" alt="Quảng cáo">
                        </a>
                    </div>

                    <!-- Bài viết liên quan -->
                    <div class="container-sidebar__item-detail">
                        <h4>Bài viết liên quan</h4>
                        @foreach ($recentNews as $item)
                                <div class="sidebar__item-detail">
                                    <img src="{{ asset('storage/'.$item->thumbnail) }}" alt="Hình ảnh">
                                    <h6><a href="#">{{ $item->title }}</a></h6>
                                </div>
                        @endforeach
                    </div>
                    
                </div>
            {{-- </div> --}}
        </div>
    </div>

    <!-- Nút chia sẻ mạng xã hội -->
    <div class="social-share">
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-twitter"></i></a>
        <a href="#"><i class="bi bi-linkedin"></i></a>
    </div>

    <!-- Bootstrap Icons (cho nút chia sẻ và bình luận) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
    


    