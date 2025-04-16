<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(9);
        return view('admin.news', compact('news'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'views' => 'nullable|integer',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['views'] = (int) ($data['views'] ?? 0);

        if ($request->hasFile('thumbnail')) {
            // Định nghĩa thư mục đích: public/storage/thumbnails
            $destinationPath = public_path('storage/thumbnails');

            // Tạo thư mục nếu chưa tồn tại
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Tạo tên file duy nhất
            $file = $request->file('thumbnail');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'thumbnails/' . $fileName;

            // Di chuyển file vào thư mục public/storage/thumbnails
            $file->move($destinationPath, $fileName);

            // Lưu đường dẫn tương đối vào database
            $data['thumbnail'] = $filePath;

            \Illuminate\Support\Facades\Log::info('Thumbnail uploaded', ['path' => $filePath]);
        }

        $news = News::create($data);
        \Illuminate\Support\Facades\Log::info('News created', ['id' => $news->id, 'thumbnail' => $news->thumbnail]);

        return redirect()->route('admin.index')->with('success', 'Tin tức đã được thêm!');
    }

    public function edit($id)
    {
        $news = News::find($id);
        $categories = DB::table('categories')->get();
        return view('admin.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'views' => 'nullable|integer',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['views'] = (int) ($data['views'] ?? 0);

        if ($request->hasFile('thumbnail')) {
            // Xóa hình ảnh cũ nếu tồn tại
            if ($news->thumbnail && file_exists(public_path('storage/' . $news->thumbnail))) {
                unlink(public_path('storage/' . $news->thumbnail));
            }

            // Lưu hình ảnh mới
            $destinationPath = public_path('storage/thumbnails');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file = $request->file('thumbnail');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'thumbnails/' . $fileName;
            $file->move($destinationPath, $fileName);

            $data['thumbnail'] = $filePath;
        }

        $news->update($data);

        return redirect()->route('admin.index')->with('success', 'Tin tức đã được cập nhật!');
    }

    public function destroy($id)
    {
        News::find($id)->delete();;
        return redirect()->route('admin.index')->with('success', 'Tin tức đã được xóa!');
    }
}