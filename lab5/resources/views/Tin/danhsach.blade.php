<div class="container">
        <h1>DANH SÁCH TIN</h1>
        <a href="/tin/create">them</a>
        @foreach ($data as $tin)
            <div class="row">
                <div class="left">
                    <h4>{{ $tin->tieude }}</h4>
                    <p>{{ $tin->tomTat }}</p>
                </div>
                <div class="right">
                    <td>
                        <a href="/tin/edit/{{$tin->id}}">Sửa</a>
                        <a href="/tin/delete/{{ $tin->id }}" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                    </td>
                </div>
            </div><hr>
        @endforeach
</div>