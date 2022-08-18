<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class,'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    } 
}
