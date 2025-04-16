<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\LoaiSanPham as LoaiSanPhamResource;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loaiSanPhams = LoaiSanPham::all();
        return response()->json([
            'status' => true,
            'message' => 'Danh sách loại sản phẩm',
            'data' => LoaiSanPhamResource::collection($loaiSanPhams),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenLoai' => 'required|string|max:255',
            'moTa' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $loaiSanPham = LoaiSanPham::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Loại sản phẩm đã được tạo thành công',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if (!$loaiSanPham) {
            return response()->json([
                'status' => false,
                'message' => 'Loại sản phẩm không tồn tại',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Chi tiết loại sản phẩm',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'tenLoai' => 'required|string|max:255',
            'moTa' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $loaiSanPham = LoaiSanPham::find($id);

        if (!$loaiSanPham) {
            return response()->json([
                'status' => false,
                'message' => 'Loại sản phẩm không tồn tại',
            ], 404);
        }

        $loaiSanPham->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Loại sản phẩm đã được cập nhật thành công',
            'data' => new LoaiSanPhamResource($loaiSanPham),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loaiSanPham = LoaiSanPham::find($id);

        if (!$loaiSanPham) {
            return response()->json([
                'status' => false,
                'message' => 'Loại sản phẩm không tồn tại',
            ], 404);
        }

        $loaiSanPham->delete();

        return response()->json([
            'status' => true,
            'message' => 'Loại sản phẩm đã được xóa thành công',
        ], 200);
    }
}
