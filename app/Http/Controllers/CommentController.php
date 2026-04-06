<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function ShowComments (){
        return "hi from controller";
    }
}
