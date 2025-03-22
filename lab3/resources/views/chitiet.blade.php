@extends('layout')
@section('tieudetrang')
    Trang chi tiết tin {{ $id }}
@endsection
@section('noidungchinh')
        <h1>Đây là trang chi tiết tin {{ $id }}</h1>
        <div class="result">
                <h3>{{ $data->tieu_de }}</h3>
                <p>{{ $data->noi_dung }}</p>
        </div>
@endsection
