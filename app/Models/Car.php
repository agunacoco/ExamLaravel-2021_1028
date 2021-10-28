<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        '이미지',
        '제조회사',
        '자동차명',
        '제조년도',
        '가격',
        '차종',
        '외형',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
