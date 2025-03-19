<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    protected $table = 'tin'; // Chỉ định rõ tên bảng là 'tin'
    protected $fillable = ['tieu_de', 'noi_dung', 'luot_xem'];
}
