@extends('layout')
@section('tieudetrang')
    Trang tin trong loại {{ $idLT }}
@endsection
@section('noidungchinh')
        <h1>Trang tin trong loại {{ $idLT }}</h1>

        @foreach ($data as $item)
                <div class="result">
                        <a href="{{ route('chitiet', $item->id) }}">{{ $item->tieu_de }}</a>
                        <div class="url">www.example.com > {{ route('chitiet', $item->id) }}</div>
                        <p>{{ $item->noi_dung }}</p>
                </div>
        @endforeach
@endsection
