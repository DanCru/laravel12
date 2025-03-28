<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề tin tức
            $table->text('excerpt')->nullable(); // Đoạn trích ngắn
            $table->text('content')->nullable(); // Nội dung đầy đủ
            $table->string('thumbnail')->nullable(); // Đường dẫn hình ảnh
            $table->string('category')->nullable(); // Danh mục (ví dụ: Du lịch, Công nghệ)
            $table->date('published_at')->nullable(); // Ngày xuất bản
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
