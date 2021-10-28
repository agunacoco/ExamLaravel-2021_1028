<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $car_id){
        
        $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'car_id' => $car_id,
        ]);

        return redirect()->route('cars.show', ['id'=>$car_id]);
        
    }

    public function destory($comment_id) {

        $comment = Comment::find($comment_id);
        $comment->delete();
        $car_id = $comment->car->id;

        return redirect()->route('cars.show', ['id'=>$car_id]);
    }
}
