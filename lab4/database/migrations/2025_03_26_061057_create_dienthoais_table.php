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
        Schema::create('dienthoais', function (Blueprint $table) {
            $table->id();
            $table->string('tenDT', 30)->unique();
            $table->string('moTa', 1000)->nullable();
            $table->dateTime('ngayCapNhat');
            $table->double('giaKM', 8, 2)->nullable();
            $table->double('gia', 8, 2);
            $table->double('urlHinh', 200)->nullable();
            $table->integer('soLuongTonKho')->default(0);
            $table->boolean('hot')->default(0);
            $table->boolean('anHien')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dienthoais');
    }
};
