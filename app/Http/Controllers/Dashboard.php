<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateArticleRequest;

use App\Article;

use App\User;

use Carbon\Carbon;


use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    
    public function __construct() {
        //$this->middleware('auth',['only' => ['create','edit:owen']]);
        
    }

    public function test() {
 
        $data1 = [
                "radius" => 10,
                "startDrawing"=>0,
                "stopDrawing"=>pi() * 2,
                "clockwise"=>false,
                "beginClosePath"=>false,
                "radius"=>10,
                "startDrawing"=>0,
                "clockwise"=>false,
                "beginClosePath"=>false,
                "style"=>[
                    "fillStyle"=>"rgba(0,60,120,1)",
                    "strokeStyle"=> "green",
                    "font"=>"14px Ariel",
                    "width"=>600,
                    "height"=>400,
                    "posx"=>200,
                    "posy"=>400
                ],
                
                "coords"=>[
                    "arc"=>[
                        "x"=>[10,130,160,250,300,320,350,380,654],
                        "y"=>[427,380,350,270,200,170,140,100,80]
                    ],
                    "bezier"=>[
                        "x"=>[[10,420,100,200,200,100],[220,200,250,180,270,100],[250,150,300,0,600,100]]
                    ],
                    "quadratic"=>[
                        "x"=>[50,100],
                        "y"=>[300,200]
                    ]
                ] 

        ];

        return collect($data1)->toJson();
        //return $sessions;//'test ajax response past';
    }

    public function index(){
        

      
        return view('dashboard.admin');
       // return view('articles.blog',['articles' => $articles]);
    }
    
    public function apiErrors(){
       
        
        //return view('articles.form-article',  compact('tags'));
    }

    public function apiEvents(){
        
        
        
        //return redirect()->route('article.index');
    }
    
    public function apiLog(){


        //return view('articles.article-single', ['articles' => $articles,'tags' => $tags]);
    }
    
    public function apiPageviews(){
       

       //return view('articles.edit',  compact('articles','tags'));
        
    }
    
    public function apiPageviewsByCountry(){
        

        //return redirect()->route('article.index');
    }
    
    public function apiUsers(){
        
        
        //return view('articles.all-articles', compact('articles'));
    }
    
    public function apiVisits() {
        
    }

    public function log() {
        
    }
}
