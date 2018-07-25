<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;



class CommentsController extends Controller
{
    public function getAllComments()
    {
        $comments = Comment::all();
        
        return $comments;
    }
}
