<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        
        $featuredNews = News::latest()->first(); // Tin nổi bật
        $recentNews = News::latest()->skip(1)->take(3)->get(); // 3 tin mới thứ 2 cho grid, vipp
        $sidebarNews = News::orderBy('views', 'asc')->take(4)->get(); // Tin cho sidebar
        $techNews = News::where('category_id', 6)->latest()->take(4)->get(); // Tin công nghệ
        $businessNews = News::where('category_id', 4)->latest()->take(4)->get(); // Tin kinh doanh
        $categories = DB::table('categories')->get();
        return view('client.home', compact('featuredNews', 'recentNews', 'sidebarNews', 'techNews', 'businessNews', 'categories'));
    }

    public function newsDetail(News $id)
    {
        $news = $id;
        $id->increment('views');
        $recentNews = News::orderBy('views', 'asc')->take(3)->get();
        $categories = DB::table('categories')->get();
        return view('client.detail', compact('news', 'recentNews', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = DB::table('categories')->get();

        $news = News::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")
                    ->get();
        return view('client.search', compact('news', 'query', 'categories'));
    }

    public function categoryNews($id)
    {
        // Lấy danh mục theo id
        $category = Category::findOrFail($id);

        // Lấy tất cả bài báo thuộc danh mục này, kèm theo quan hệ category
        $news = News::with('category')
                ->where('category_id', $id)
                ->orderBy('created_at', 'desc') // Sắp xếp theo ngày đăng mới nhất
                ->paginate(9);

        $categories = DB::table('categories')->get();

        // Trả về view với danh mục và danh sách bài báo
        return view('client.category', compact('category', 'news', 'categories'));
    }
}
