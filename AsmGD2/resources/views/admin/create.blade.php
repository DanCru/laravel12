<!DOCTYPE html>
<html>
<head>
    <title>Thêm tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Thêm tin tức</h1>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="excerpt" class="form-label">Đoạn trích</label>
                <textarea name="excerpt" id="excerpt" class="form-control">{{ old('excerpt') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Hình ảnh</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Danh mục</label>
                <select name="category_id" id="">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" name="category_id" id="category" class="form-control" value="{{ old('category') }}"> --}}
            </div>
            <div class="mb-3">
                <label for="views" class="form-label">Lượt xem</label>
                <input type="text" name="views" id="views" class="form-control" value="0">
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Ngày xuất bản</label>
                <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') }}">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>