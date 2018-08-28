<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// use Illuminate\Support\Facades\File;

use App\Page;

use App\User;

use Validator;

use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    // protected targetDirName;
    // protected fileExtension;
    protected $pageModel;
    protected $targetDirName;
    
    public function __construct(Page $pages){
        $this->pageModel = $pages;
        //$this->initPages();
    }

    protected function initPages(){
        $this->targetDirName =  "pages/";
        $fileExt = ".blade.php";
        $section = "@extends('dashboard.layout.admin_master')\n@section('title')\n   ";
        $endsection = "\n@endsection\n";
        $section = "@section('section')\n   <h1 style='color:rgba(180,180,220,1);'>";
        $endh1 = "</h1>";

        /**********Storage**********/
        
        $isFalseCreateDir = ! Storage::has($this->targetDirName)? Storage::createDir($this->targetDirName) : true;

        if(count(Page::all()) && $isFalseCreateDir){
            foreach(Page::all() as $page){
                if(! Storage::has($this->targetDirName . $page->page_name .$fileExt)) Storage::write($this->targetDirName . $page->page_name .$fileExt,$section . ucfirst($page->title) ." ". $endsection . $section . ucfirst($page->body) .$endh1 .$endsection);/*$page->page_name .$fileExt ." page"*/
            }
        }
        
        /**********Flysystem**********/
        /*$isFalseCreateDir = ! Flysystem::has($this->targetDirName)? Flysystem::createDir($this->targetDirName) : true;

        if(count(Page::all()) && $isFalseCreateDir){
            foreach(Page::all() as $page){
                if(! Flysystem::has($this->targetDirName . $page->page_name .$fileExt)) Flysystem::write($this->targetDirName . $page->page_name .$fileExt,$page->page_name .$fileExt ." page");
            }
        }*/
        
    }


    public function index()
    {
        /*$route = url()->current();
        $route = explode('8080/', $route);
        $route = isset($route[1])?$route[1]:'wellcome';*/
        // dd(Page::all());

        $pages = $this->pageModel::all();
        // $pages->getPageListAttribute();
        return view('dashboard.pages-index',  compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('dashboard.create-page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = [];
        $hierarchy = $request->only(['ancestor','descendant']);
        $haveErrors = empty($hierarchy['ancestor']) && empty($hierarchy['descendant']) ? $msg['empty'] = 'יש לבחור אחד מהשדות הבאים בהיררכיה: "ראשי" או "משני"':
        ! empty($hierarchy['ancestor']) && ! empty($hierarchy['descendant']) ? $msg['empty'] = 'יש לבחור אחד מהשדות הבאים בהיררכיה בלבד: "ראשי" או "משני"':true;
        $num = is_numeric($hierarchy['ancestor']) || is_numeric($hierarchy['descendant']) ? true : $msg['nomeric'] = 'נתון שגוי' ;

        $req = $request->except('_token');

        $validator = Validator::make($req,[
            'pageName' => 'required|min:3',
            'title' => 'required|min:6',
            'body' => 'required|min:10'
        ],[
            'pageName.required' => 'אנא מלא את שדה "שם דף".',
            'title.required' => 'אנא מלא את שדה "כותרת".',
            'body.required' => 'אנא מלא את שדה "תוכן הדף".',
            'body.required' => 'אנא מלא את שדה "תוכן הדף".',
            'pageName.min' => 'אנא מלא "שם דף" לפחות ב 3 מילים.',
            'title.min' => 'אנא מלא "כותרת" לפחות ב 6 מילים.',
            'body.min' => 'אנא מלא "תוכן הדף" לפחות ב 10 מילים.'
        ]);
        //dd($req);
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator,'createPageErrors')
                        ->withInput();
        }
        else if(isset($msg['empty']) || isset($msg['nomeric'])){ //dd($msg.array_push($msg, var));

            return redirect()
                        ->back()
                        ->withErrors($msg,'createPageErrors')
                        ->withInput();
        }
        $owner = auth()->check()? auth()->user(): rand(1,count(User::all()));
        
        isset($req["ancestor"])? $hierarchy = ['main' => $req["ancestor"]] : $hierarchy = ['user' => $req["descendant"]];
        
        $hierkey = key($hierarchy);
        
        $req['owner'] = isset($owner->permission)? $owner->permission :'author';
        $req['user_id'] = isset($owner->id)? $owner->id : $owner;
        $req['page_name'] = $req['pageName'];
        $req['hierarchy'] = $hierkey;
        $req['page_id'] = $hierarchy[$hierkey];
        $req['url'] =  ($hierkey !== "main")? $this->pageModel::find($hierarchy[$hierkey])->page_name . "/" . str_slug($req['pageName']): str_slug($req['pageName']);

        isset($req['ancestor'])? array_pull($req,'ancestor'):array_pull($req,'descendant');
        array_pull($req,'pageName');
        
        //dd($req);
        $this->pageModel::create($req);
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);

        $page = $this->pageModel::find($id);
        return view('dashboard.edit-page',['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function pageEditor($id){

        $page = $this->pageModel::find($id);
        //dd($page);
        return view('dashboard.page-editor',['page' => $page]);
    }
}
