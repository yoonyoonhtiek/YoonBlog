<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    // 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
    public function __construct(){
        $this->middleware('auth')->except(['index','detail']);
    }
    public function index(){
      $data= Article::latest()->Paginate(5);
      return view('index',['articles'=>$data]);
        
    }
    public function detail($id){
        $data=Article::find($id);
        // dd($data->toArray());
        return view('detail',[
            'article'   =>  $data
        ]);

    }
    public function delete($id){
        $article=Article::find($id);
        // dd(auth()->user()->id);
        // dd($article->toArray());
        if($article->user_id===auth()->user()->id){
            $article->delete();
            return redirect()->route('index');
        }else{
            return back()->with('errors','Unauthorized');
        }
    

   
   }

    



    public function add(){
      $data=[
        [
            'id'    =>  1 , "name"  =>  "New ",
            'id'    =>  2 , "name"  =>  "Tech ",
           
        ]
        ];
        return view('/add',[
            'categories'=>$data
        ]);
    }
    public function create(){

        $validator=validator(request()->all(),[
            'title'         =>  'required',
            'body'          =>  'required',
            'category_id'   =>  'required',
         
          
          
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        };
        $article=new Article();
        $article->title= request()->title;
        $article->body=request()->body;
        $article->category_id=request()->category_id;
        $article->user_id=Auth::id();
    

        $article->save();
        return redirect('/articles');
        
    }
    

     
    
    
}
