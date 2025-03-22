<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinController extends Controller
{
    public function index(){
        $data = DB::table('tin')->get();
        $tintrongloai = DB::table('theloai')->get();
        
        return view('home', compact('data', 'tintrongloai'));
    }

    public function chitiet($id){
        $data = DB::table('tin')->where('id', $id)->first();
        $tintrongloai = DB::table('theloai')->get();
        return view('chitiet', compact('data', 'id', 'tintrongloai'));
    }

    public function tintrongloai($idLT){
        $data = DB::table('tin')->where('loai_tin', $idLT)->get();
        $tintrongloai = DB::table('theloai')->get();
        return view('tintrongloai', compact('data', 'tintrongloai', 'idLT'));
    }
}
