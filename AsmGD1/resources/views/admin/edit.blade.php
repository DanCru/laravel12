<!DOCTYPE html>
<html>
<head>
    <title>Sửa tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <main class="main-content main-content--expanded">
            <div class="container mt-5">
                <h1>Sửa tin tức</h1>
                <form action="{{ route('admin.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Đoạn trích</label>
                        <textarea name="excerpt" id="excerpt" class="form-control">{{ $news->excerpt }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea name="content" id="content" class="form-control">{{ $news->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Hình ảnh</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                        @if ($news->thumbnail)
                            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="Thumbnail" width="100" class="mt-2">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Danh mục</label>
                        <select name="category_id" id="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Ngày xuất bản</label>
                        <input type="date" name="published_at" id="published_at" class="form-control" value="{{ $news->published_at }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
    </<main>
</body>
</html>