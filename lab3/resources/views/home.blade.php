@extends('layout')
@section('tieudetrang')
    Trang chủ tin tức
@endsection
@section('noidungchinh')
        <h1>Đây là trang chủ</h1>
        @foreach ($data as $item)
                <div class="result">
                        <a href="{{ route('chitiet', $item->id) }}">{{ $item->tieu_de }}</a>
                        <div class="url">www.example.com > {{ route('chitiet', $item->id) }}</div>
                        <p>{{ $item->noi_dung }}</p>
                </div>
        @endforeach
        
        
@endsection
