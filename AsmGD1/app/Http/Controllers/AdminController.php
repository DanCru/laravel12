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
        $news = News::latest()->paginate(10);
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
            'category_id' => 'nullable',
            'views' => 'nullable|integer',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['views'] = (int) ($data['views'] ?? 0);
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        News::create($data);

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
        $news = News::find($id);
        // dd($news); 
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable',
            'published_at' => 'nullable|date',
        ]);

        // Cập nhật dữ liệu vào bản ghi hiện tại
        $news->title = $request->input('title');
        $news->excerpt = $request->input('excerpt');
        $news->content = $request->input('content');
        $news->category_id = $request->input('category_id');

        // Xử lý published_at
        $news->published_at = $request->filled('published_at') 
            ? \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('published_at')) 
            : null;

        // Xử lý file thumbnail
        if ($request->hasFile('thumbnail')) {
            // Xóa thumbnail cũ nếu tồn tại
            if ($news->thumbnail) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($news->thumbnail);
            }
            // Lưu thumbnail mới
            $news->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Lưu thay đổi vào bản ghi hiện tại
        $news->save();

        return redirect()->route('admin.index')->with('success', 'Tin tức đã được cập nhật!');
    }

    public function destroy($id)
    {
        News::find($id)->delete();;
        return redirect()->route('admin.index')->with('success', 'Tin tức đã được xóa!');
    }
}