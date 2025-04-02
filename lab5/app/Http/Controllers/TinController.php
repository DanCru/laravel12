<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Psy\debug;
use App\Models\Tin;

class TinController extends Controller
{
    public function index()
    {
        $data = \App\Models\Tin::all();
        return view('Tin/danhsach', compact('data'));
    }

    public function create()
    {
        return view("Tin/themtin");
    }

    public function store(Request $request)
    {
        tin::create($request->all()); 
        return redirect('/tin/ds');
    }

    public function destroy($id){
        Tin::destroy($id);
        return redirect('/tin/ds');
    }

    public function edit($id)
{
    $tin = Tin::find($id);
    return view('Tin/capnhattin', compact('tin'));
}
public function update(Request $request){
    Tin::find($request->id)->update($request->all());
    return redirect('/tin/ds');
}




    public function home()
    {
        $query = DB::table('tin')
            ->select('id', 'tieude', 'tomTat', 'ngayDang', 'idLoai')
            ->orderBy('ngayDang', 'desc')
            ->limit(10);
        $data = $query->get();

        $loai = DB::table('tin')
            ->select('idLoai')
            ->orderBy('idLoai', 'asc')
            ->distinct()
            ->get();

        return view('home', compact('data', 'loai'));
    }

    public function lienhe()
    {
        // echo "Day la trang lien he";
        return view('lienhe');
    }
    // public function lay1tin($id){
    //     $data = ['id' => $id];
    //     return view('chitiet', $data);
    // }
    public function chitiet($id)
    {
        $tin = DB::table('tin')->where('id', $id)->first();
        // Lấy danh sách idLoai duy nhất từ bảng tin
        $loai = DB::table('tin')
            ->select('idLoai')
            ->orderBy('idLoai', 'asc')
            ->distinct()
            ->get();
        return view('chitiettin', compact('loai', 'tin'));
    }
    public function tintrongloai($idLoai)
    {
        $query = DB::table('tin')
            ->select('id', 'tieude', 'tomTat', 'idLoai')
            ->where('idLoai', '=', $idLoai)
            ->orderBy('ngayDang', 'desc');
        $data = $query->get();

        $loai = DB::table('tin')
            ->select('idLoai')
            ->orderBy('idLoai', 'asc')
            ->distinct()
            ->get();
        return view('tintrongloai', compact('loai', 'data', 'idLoai'));
    }
}