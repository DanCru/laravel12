<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HiController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return view('welcome', compact('products'));
    }
    public function edit($id)
    {
        $id = $id;
        $products = DB::table('products')->get();
        return view('welcome', compact('products'));
    }
}
