<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinController extends Controller
{
    public function xemnhieu(){
        $tin = Tin::orderBy('luot_xem', 'DESC')->limit(5)->get();
        return view('tinxemnhieu', compact('tin'));
    }

    public function tinmoi(){
        $tin = Tin::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('tinmoi', compact('tin'));
    }

    public function tintrongloai($id){
        $tin = DB::table('tin')
        ->join('theloai', 'tin.loai_tin', '=', 'theloai.id')
        ->select('tin.*', 'theloai.ten_loai')->where('tin.loai_tin' , "=", $id)
                 ->orderBy('tin.created_at', 'DESC')
                 ->limit(5)
                 ->get();
        return view('tintrongloai', compact('tin'));
    }

    public function tinchitiet($id)
    {
        $tin = DB::table('tin')
        ->join('theloai', 'tin.loai_tin', '=', 'theloai.id')
        ->select('tin.*', 'theloai.ten_loai')->where('tin.id' , "=", $id)->first();

        return view('tinchitiet', compact('tin'));
    }
}
