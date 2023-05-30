<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(){

        $userId=auth()->id();
     
        $comment=new Comment();
        $comment->content = request()->content;
        $comment->article_id=request()->article_id;
        $comment->user_id=$userId;

        $comment->save();
        return back();

        

    }
    public function delete($id){
            $comment=Comment::find($id);
            // dd($comment);
            if($comment->user_id==auth()->user()->id){
                $comment->delete();
                return back();
            }else{
                return back()->with('errors','Unauthorized');
            }
        

       
       }


       
    } 






    

        
       
    

