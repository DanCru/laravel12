@extends('admin/layoutAdmin')
@section('title')
    Admin Dashboard Page
@endsection
@section('news')
<body>
    <main class="main-content main-content--expanded">
        <div class="">
            <h1>Quản lý tin tức</h1>
            <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Thêm tin tức</a>
    
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Thumbnail</th>
                        <th>Ngày xuất bản</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category_id }}</td>
                            <td>
                                @if ($item->thumbnail)
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                        style="width: 100px; height: auto;">
                                @else
                                    <span>Không có ảnh</span>
                                @endif
                            </td>
                            <td>{{ $item->published_at }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $news->links() }}
        </div>
    </main>
</body>


@endsection


