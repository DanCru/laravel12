<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $cate = DB::table('categories')->get();
        return view('category', compact('cate'));
    }
}
