<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $arr = [
            "status" => true,
            "message" => "Danh sách sản phẩm",
            "data" => ProductResource::collection($products)
        ];
        return response()->json($arr, 200);
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
        $input = $request->all();
        $product = Product::create($input);
        $arr = [
            "status" => true,
            "message" => "Sản phẩm đã lưu thành công",
            "data" => new ProductResource($product)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "status" => false,
                "message" => "Sản phẩm không tồn tại"
            ], 404);
        }
        $arr = [
            "status" => true,
            "message" => "Chi tiết sản phẩm",
            "data" => new ProductResource($product)
        ];
        return response()->json($arr, 200);
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
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "status" => false,
                "message" => "Sản phẩm không tồn tại"
            ], 404);
        }

        $input = $request->all();
        $product->update($input);

        $arr = [
            "status" => true,
            "message" => "Sản phẩm đã cập nhật thành công",
            "data" => new ProductResource($product)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "status" => false,
                "message" => "Sản phẩm không tồn tại"
            ], 404);
        }

        $product->delete();
        $arr = [
            "status" => true,
            "message" => "Sản phẩm đã xóa thành công"
        ];
        return response()->json($arr, 200);
    }
}
