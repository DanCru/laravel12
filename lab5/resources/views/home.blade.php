@extends('layout')
@section('title', 'Home page')
@section('content')   
    <!-- Main Content -->
    <div class="container news-container mt-5 pt-4">
        <h1 class="text-center header-title">Tin tuc moi nhat</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($data as $tin)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tin->tieude }}</h5>
                            <p class="card-text">{{ $tin->tomTat }}</p>
                            <p class="date-text">Ngày đăng: {{ \Carbon\Carbon::parse($tin->ngayDang)->format('d/m/Y') }}</p>
                            <a href="{{-- {{ route('tin.id', $tin->id) }} --}}" class="btn btn-primary mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Không có tin tức mới nào.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection