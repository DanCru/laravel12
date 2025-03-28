@extends('client/layoutClient')

@section('content-search')
    <div class="search-results-container">
        <h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>
        @if($news->isEmpty())
            <p>Không tìm thấy kết quả nào.</p>
        @else
            @foreach($news as $item)
            <div class="search-result-item">
                @if($item->thumbnail)
                    <!-- Log giá trị image để debug -->
                    @php
                        \Illuminate\Support\Facades\Log::info('Image path for news item', ['id' => $item->id, 'image' => $item->image]);
                    @endphp
                    <div class="search-result-thumbnail">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}">
                    </div>
                @else
                    <!-- Log nếu không có hình ảnh -->
                    @php
                        \Illuminate\Support\Facades\Log::warning('No image for news item', ['id' => $item->id]);
                    @endphp
                @endif
                <div class="search-result-content">
                    <h2><a href="{{ route('news.detail', $item->id) }}">{{ $item->title }}</a></h2>
                    <p>{{ Str::limit($item->content, 200) }}</p>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection