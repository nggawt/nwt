<?php 
namespace App\Http\ViewComposers;

// use View;
use \Carbon\Carbon;
use Redis;
use App\Page;

class PagesComposer
{
	protected  $pages;

	public function __construct(Page $pages){
		$this->pages = $pages;
	}
	
	public function compose($view){
		//$pages = Page::all();
		//dd($pages);
		$pages = $this->pages->getPageListAttribute('hierarchy');
		$pageName = [];
		foreach($pages as $key => $name){
		    
		   $pageName[$key] = $this->getHebNameAttribute($name);
		}
		$view->with('pageName', $pageName);
	}
	protected function getHebNameAttribute($key){
        $value = null;
        //if($key == 'web') dd($value);
        if($key == 'web') $value = 'בניית אתרים';
        if($key == 'wellcome') $value = 'דף הבית';
        if($key == 'portfolio') $value = 'פורטפיליו';
        if($key == 'article') $value = 'בלוג';
        if($key == 'admin') $value = 'ניהול';
        if($key == 'about') $value = 'אודות';
        if($key == 'contact') $value = 'צור קשר';
        if($key == 'users') $value = 'משתמשים';
        return isset($value) ? $value : $key;
    }
}