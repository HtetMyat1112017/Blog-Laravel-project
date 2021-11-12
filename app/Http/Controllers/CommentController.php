<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }
   public function create(){
        return view('articles.detail');
   }
   public function store(Request $request){

        $comment=new Comment();
        $comment->content=$request->comment;
        $comment->article_id=$request->article_id;
        $comment->save();
        return back();

   }
   public function delete($id){

        $comment=Comment::find($id);
       if(Gate::allows('comment-delete',$comment)){
           $comment->delete();

           return back();
       }
       else {
           return back()->with('error', 'Unauthorize');
       }


   }
}
