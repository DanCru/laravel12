@extends('layout')
@section('title', 'Home page')
@section('content')    
<form action="/tin/update/{{ $tin->id }}" method="post" class="col-7 m-auto">
    <p class="mt-5"> Tiêu đề: <input name="tieuDe" class="form-control" value="{{ $tin->tieudee }}"></p>
    <p> Tóm tắt: <textarea name="tomTat" class="form-control">{{ $tin->tomTat }}</textarea></p>
    <p> urlHinh: <input name="urlHinh" class="form-control" value="{{ $tin->urlHinh }}"></p>
    <p> idLT: <select name="idLT" class="form-control">
        <option value="1" {{ $tin->idLT == 1 ? 'selected' : '' }}>Xã hội</option>
        <option value="3" {{ $tin->idLT == 3 ? 'selected' : '' }}>Du lịch</option>
    </select>
    </p>
    <p><button type="submit" class="bg-warning p-2">Cập nhật tin</button></p>
    @csrf
</form>
@endsection