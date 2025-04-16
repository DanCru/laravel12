@extends('client/layoutClient')

@section('content-search')
    <div class="category-card-container">
        <!-- Breadcrumb -->
        <div class="category-card-breadcrumb">
            <a href="{{ route('news.home') }}">Trang chủ</a> » 
            <span>{{ $category->name }}</span>
        </div>

        <!-- Tiêu đề danh mục -->
        <h1>Tin tức trong danh mục: {{ $category->name }}</h1>

        <!-- Danh sách bài báo dạng card -->
        @if($news->isEmpty())
            <p>Không có bài báo nào trong danh mục này.</p>
        @else
            <div class="category-card-grid">
                @foreach($news as $item)
                <div class="category-card">
                    <div class="category-card-image">
                        <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : asset('images/default-image.jpg') }}" alt="{{ $item->title }}">
                    </div>
                    <div class="category-card-body">
                        <h3><a href="{{ route('news.detail', $item->id) }}">{{ $item->title }}</a></h3>
                        <div class="category-card-meta">
                            <span class="category-card-date">
                                <i class="fa-solid fa-calendar-alt"></i> 
                                {{ $item->created_at->format('d/m/Y') }}
                            </span>
                            <span class="category-card-category">
                                <i class="fa-solid fa-tag"></i> 
                                {{ $item->category->name }}
                            </span>
                        </div>
                        <p>{{ Str::limit($item->content, 100) }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Phân trang -->
            @if($news->hasPages())
                <div class="category-card-pagination">
                    {{ $news->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection