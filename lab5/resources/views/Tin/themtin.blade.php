@extends('layout')
@section('title', 'Home page')
@section('content')    
<form action="/tin/store" method="post" class="col-7 m-auto">
    <p class="mt-5"> Tiêu đề: <input name="tieude" class="form-control"></p>
    <p> Tóm tắt: <textarea name="tomTat" class="form-control"></textarea></p>   
    <p> UrlHinh: <textarea name="urlHinh" class="form-control"></textarea></p>   
    <p> idLT: <select name="idLoai" class="form-control">
        <option value="1">Xã hội</option>
        <option value="3">Du lịch</option>
    </select>
    </p>
    <p><button type="submit" class="bg-warning p-2">Thêm tin</button></p>
    @csrf
</form>
@endsection