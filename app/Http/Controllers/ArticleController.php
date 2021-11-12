<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','detail']);
    }

    //
    public function index(){
       $data=Article::latest()->paginate(5);
        return view("articles.index",['articles' => $data]);
    }



    public function create(){
        $data = [
            [ "id" => 1, "name" => "News" ],
            [ "id" => 2, "name" => "Tech" ],
        ];
        return view('articles.create', [
            'categories' => $data
        ]);
    }
    public function store(Request $request){
        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article=new Article();
        $article->title=$request->title;
        $article->body=$request->body;
        $article->category_id=$request->category_id;
        $article->save();
        return redirect()->route("article.create");
    }
    public function detail($id){
        $article=Article::find($id);
        return view('articles.detail',compact("article"));
    }
    public function edit($id){
        $data = [
            [ "id" => 1, "name" => "News" ],
            [ "id" => 2, "name" => "Tech" ],
        ];
        $article=Article::find($id);
        return view('articles.edit',compact("article","data"));
    }
    public function update(Request $request,$id){
        $article=Article::find($id);
        $article->title=$request->title;
        $article->body=$request->body;
        $article->category_id=$request->category_id;
        $article->update();
        return redirect()->route("article.edit",$article->id);

    }
    public function destroy($id){
        $article=Article::find($id);
        $article->delete();
        return redirect()->route("article.index")->with('info','Article is deleted');
    }
}
