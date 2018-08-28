<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\CreateArticleRequest;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth',['only' => ['create','edit:owen']]);
        
    }

    
    public function index(){

        $articles = Article::where('published_at','<',Carbon::now())->latest()->get();
        //dd($articles);
        foreach ($articles as $article){
            $article->body = $this->getExcerpt($article->body);
            //return $article->body;
        }
        return view('articles.blog',['articles' => $articles]);
    }
    
    public function create(){
        $tags = Tag::lists('name','id');
        return view('articles.form-article',  compact('tags'));
    }

    public function store(Request $req){
        $this->validate($req,[
            'title' => 'required|min:6',
            'body' => 'required|min:10'
        ]);
        //dd($req->input('tag_list'));
        $artticles = Auth::User()->articles()->create($req->all());
        $artticles->tags()->attach($req->input('tag_list'));
        
        return redirect()->route('article.index');
    }
    
    public function show(Article $articles){
//        $articles->body =$this->getExcerpt($articles->body);
        $tags = $articles->tags->lists('name');
        return view('articles.article-single', ['articles' => $articles,'tags' => $tags]);
    }
    
    public function edit(Article $articles){
        if($articles->user_id == Auth::id()){
            $tags = Tag::lists('name','id');
            
            return view('articles.edit',  compact('articles','tags'));
        }
        return redirect()->back()->with(['ms' => 'hiii']);
    }
    
    public function update(Article $articles,CreateArticleRequest $req){
        
//        $this->validate($req,[
//            'title' => 'required|min:6',
//            'body' => 'required|min:10'
//        ]);
         
        //dd($req->input('tag_list'));
        $articles->update($req->all());
        if(count($req->input('tag_list'))){
            $articles->tags()->sync($req->input('tag_list'));
        }  else {
            $articles->tags()->sync([]);
        }
        return redirect()->route('article.index');
    }
    
    public function getAllPost(Article $articles){
        
        $articles = $articles->user()->first()->articles()->latest()->get();
        //dd($articles);
        foreach ($articles as $article){
            $article->body = $this->getExcerpt($article->body);
        }
        return view('articles.all-articles', compact('articles'));
    }
    
    protected function getExcerpt($str, $startPos=0, $maxLength=600) {
        if(strlen($str) > $maxLength) {
                $excerpt   = substr($str, $startPos, $maxLength-3);
                $lastSpace = strrpos($excerpt, ' ');
                $excerpt   = substr($excerpt, 0, $lastSpace);
                $excerpt  .= '...';
        } else {
                $excerpt = $str;
        }

        return $excerpt;
    }
}
