<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    protected $table = 'tin';
    protected $primaryKey = 'id';
    protected $dates = ['ngayDang'];
    protected $fillable = [
        'tieude', 'tomTat', 'idLoai','urlHinh', 'ngayDang' , 'noiBat' , 'anHien', 'tags', 'lang',
    ];
}
?>