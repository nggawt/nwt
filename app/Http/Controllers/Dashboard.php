<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateArticleRequest;

use App\Article;

use App\User;

use App\Page;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Redis;

class Dashboard extends Controller
{
    protected $dt;
    protected $dayWeek;
    protected $day;
    protected $week;
    protected $month;
    protected $year;
    protected $daysOnMonth;
    protected $dtCopy;
    protected $statusArr = ['daily','weekly','monthly','yearly'];
    protected $pages = ['wellcome','web','article','portfolio','about','contact','admin'];
    protected $weekStr = ["רשון","שני","שלישי","רביעי","חמישי","שישי","שבת"];

    public function __construct() {
        
        $dt = Carbon::now();
        $this->dt = $dt;
        $this->day = $dt->day;
        $this->month = $dt->month;
        $this->week = $dt->weekOfMonth;
        $this->year = $dt->year;
        $this->dayWeek = $dt->dayOfWeek;
        $this->daysOnMonth = $dt->daysInMonth;
        $this->dtCopy = $dt->copy();
    }

    protected function updateDates($year = null,$month = null,$dayOmonth = null){
        $this->dtCopy->year = $year?$year:$this->year;
        $this->dtCopy->month = $month?$month:$this->month;
        $this->dtCopy->day = $dayOmonth?$dayOmonth:$this->day;
    }

    protected function formatedDates($year = null,$month = null,$dayOmonth = null,$wanted = null){
        $year = $year?$year:$this->dtCopy->year;
        $month = $month?$month:$this->dtCopy->month;
        $day = $dayOmonth?$dayOmonth:$this->dtCopy->day;
        //dd($day - $this->dtCopy->dayOfWeek);
        if($wanted){
            switch ($wanted) {
                case 'daily':
                    return $day . "/" . $month . "/" . $year;
                break;
                case 'weekly':
                    return ($day < $this->dtCopy->dayOfWeek)? 1 . "/" . $month . "/" . $year . " - " . $day . "/" . $month . "/" . $year :$day . "/" . $month . "/" 
                            . $year  . " - " . ( $day - $this->dtCopy->dayOfWeek) . "/" . $month . "/" . $year;
                break;
                case 'monthly':
                    return ($this->dtCopy->day === $this->day && $this->dtCopy->month === $this->month)? $this->dtCopy->day . "/" . $this->dtCopy->endOfMonth()->month . "/" . $year ." - " . $this->dtCopy->startOfMonth()->day . "/" . $month . "/" . $year: $this->dtCopy->endOfMonth()->day . "/" . $this->dtCopy->endOfMonth()->month . "/" . $year ." - " . $this->dtCopy->startOfMonth()->day . "/" . $month . "/" . $year;
                break;
                case 'yearly':
                    return $this->dtCopy->endOfYear()->day . "/" . $this->dtCopy->endOfYear()->month . "/" . $year . " - " . $this->dtCopy->startOfYear()->day . "/" . $this->dtCopy->startOfYear()->month. "/" . $year;
                break;
                default:

                break;
            }
        }
    }

    protected function getDataByUrl($url){

                
                $ep = explode("-", $url);
                //return (int) $ep[1];
                $days = (int) $ep[0];
                $dayMonths = (int) $ep[1];
                $currentYear = (int) $ep[2];
                
               //dd($currentYear);
                $days = strlen($ep[0]) === 2 && $days < 10? (int) substr($ep[0],1,1) :$days;
                $dayMonths = strlen($ep[1]) === 2 && $dayMonths < 10? (int) substr($ep[1],1,1):$dayMonths;
                //dd($dayMonths);
                $this->updateDates($currentYear,$dayMonths,$days);
                //if($currentYear !== 2017) return false;
                return $days === 0? ['data' => $this->monthly($dayMonths),'status' => 'חודשי ' . $this->formatedDates("",$dayMonths,$days,"monthly")] :
                        ['data' => $this->daily($this->dtCopy->day,$dayMonths),'status' => 'שבועי ' . $this->formatedDates("",$dayMonths,$days,"daily")];
                
    }

    protected function getDataBySelected(){

        $req = request()->has('selected')?request()->get('selected'):"";
        
        if(! isset($req)  || trim($req,'"') == "" || trim($req,"'") == ""){
           
            $selected = session()->has('selected')?session()->get('selected'):0;
        }else{
            $selected = $req;
        }

        $selected = (int) $selected;
        
        if($selected >= count($this->statusArr)) $selected = count($this->statusArr) -1;
        if($selected < 0) $selected = 0;
        
        $status = session()->put('status', $this->statusArr[$selected]);
        $putSelected = session()->put('selected', $selected);

        if(isset($this->statusArr[$selected])){
            $formated = $this->formatedDates("","","",$this->statusArr[$selected]);
           // dd($selected);
            switch ($this->statusArr[$selected]) {
                case 'daily':
                    return ['data' => $this->daily(),'status' => 'יומי ' . $formated,'selected' => $selected];
                    break;
                case 'weekly':
                
                    return ['data' => $this->weekly(),'status' => 'שבועי ' . $formated,'selected' => $selected];
                    break;
                case 'monthly':
                    return ['data' => $this->monthly(),'status' => 'חודשי ' . $formated,'selected' => $selected];
                    break;
                case 'yearly':
                    return ['data' => $this->yearly(),'status' => 'שנתי ' . $formated,'selected' => $selected];
                    break;
                
                default:
                    # code...
                    $data = ['data' => $this->daily(),'status' => 'יומי','selected' => $selected];
                    break;
            }
        }
    }
    
    public function test() {
        
        $data = null;

        $param = ! request()->has('pickDate')?null:request()->get('pickDate');

        $preg = preg_match("/^[0-9]{1,2}\-(?=0?[1-9]+?)[0-9]{1,2}\-(?=20)[0-9]{2}1[0-9]$/", $param,$match);

        if($preg){
            $match = $match[0];
            if(is_string($match) && (strlen($match) === 10 || strlen($match) === 8) || strlen($match) === 9){
                //dd("jjhhjh");
                $data = $this->getDataByUrl($match);
            }
        }else if(in_array($param,$this->statusArr) || ! $param){
            //dd("fffff");
            $data = $this->getDataBySelected();
        }
            //dd("jjhhjh");
        return collect($data)->toJson();
    }

    public function daily($day = null,$month = null,$year = null){
        //$redis = Redis::zrange("visits:".$this->dtCopy->day.":".$this->dtCopy->month.":".$this->dtCopy->year,0,-1,'WITHSCORES');
        $day = $day? $day : $this->day;
        $month = $month? $month : $this->month;
        $data = $this->getRedis($day,$day,$month);

        asort($data);
        return $data;
    }

    public function yearly($len = 12){
        if($this->day == 1 && $this->month == 1 && $this->year != 2017) return $this->daily();

        $data = [];
        $dataObj = [];
        //$dtCopy = $this->dt->dtCopy();
        for ($ii=1; $ii <= 12; $ii++) { 

            $this->dtCopy->month = $ii;
            $dyInMonth = $this->dtCopy->daysInMonth;
            if($ii < $this->month){
                $data[] = $this->getRedis(1,$dyInMonth,$ii);
                
            }else if($this->month == $ii){
                $data[] = $this->getRedis(1,$this->day,$ii);
                break;
            }
        }
        foreach ($data as $array) {

            foreach ($array as $page => $score) {
                $dataObj[$page] = isset($dataObj[$page])?$dataObj[$page] + $score:$score;
            }
        }
        asort($dataObj);
        // dd($dataObj);
        return $dataObj;
    }

    public function monthly(){
        if($this->day == 1 && $this->dt->month == 1) return $this->daily();
        //$this->dtCopy->month = $month;
        $dyInMonth = $this->dtCopy->daysInMonth;
        $data = $this->getRedis(1,$dyInMonth,$this->dtCopy->month);

        asort($data);
        return $data;
    }

    public function weekly($idx = null,$len = null){

        $len = $len ? $len: $this->dtCopy->day;
        $idx = $idx ? $idx : ($this->dtCopy->day - $this->dtCopy->dayOfWeek);

        $data = $this->getRedis($idx,$len);
        asort($data);
        return $data;
    }

    protected function getRedis($counter = 1,$lenght,$month = null){
        $month = $month?$month:$this->month;
        // dd($counter);
        $data = [];
        $pagesIndex = 0;
        
        for ($ii = $counter; $ii <= $lenght; $ii++) {
                
            foreach($this->pages as $page){

                $score = Redis::ZSCORE("visits:".$page, $ii.":".$month.":".$this->dtCopy->year);
                if($score) $data[$page] = isset($data[$page])? $data[$page] += $score :$score;

            }
        }
        //dd($data);

        /*ORIGINAL*/
        /*
        for ($ii = $counter; $ii <= $lenght; $ii++) {
            if(Redis::EXISTS("visits:".$ii.":".$month.":".$this->dtCopy->year)){
                //Redis::ZREM("visits:".$ii.":".$month.":".$this->year,"portfolio");
                $redisObj = Redis::zrange("visits:".$ii.":".$month.":".$this->dtCopy->year,0,-1,'WITHSCORES');
                foreach($redisObj as $key => $value){
                    //echo $key.  " : " . $value . "<br />";
                    $data[$key] = isset($data[$key])?$data[$key] += $value:$value;

                 }
            }
        }
        */

        $data = count($data) ? $this->getPagesName($data) : $data;
        
        return $data;
    }

    protected function getDaysOfYear(){

        $data = [];
        $dtCopy = $this->dt->dtCopy();
        for ($ii=1; $ii <= 12; $ii++) { 
            
            $dtCopy->month = $ii;
            $dyInMonth = $dtCopy->daysInMonth;
            if($this->dt->day == $dtCopy->day && $this->month == $ii){
                $data = $data + $this->day;
                break; 
            }
            $data = ! empty($data)?$data + $dyInMonth:$dyInMonth;
        }
        return $data;
    }

    protected function getPagesName($items){
        $pages = [];
        foreach ($items as $key => $value) {
            # code...
            if($key == 'web') $pages['בניית אתרים'] = $value;
            if($key == 'wellcome') $pages['דף הבית'] = $value;
            if($key == 'portfolio') $pages['פורטפיליו'] = $value;
            if($key == 'article') $pages['בלוג'] = $value;
            if($key == 'admin') $pages['ניהול'] = $value;
            if($key == 'about') $pages['אודות'] = $value;
            if($key == 'contact') $pages['צור קשר'] = $value;
            if($key == 'users') $pages['משתמשים'] = $value;
        }
        return $pages;
    }

    public function index(){

        $pagesViews = $this->yearly('yearly');
        arsort($pagesViews);
        $maxItem = collect($pagesViews)->take(4);
        //dd($maxItem);
        //$yearlyView = $this->getPagesName($maxItem);
        

        $users = User::latest()->get();
        //dd($users);
        $dt = date('Ymhms');

        $date = Carbon::now()->format($dt);
        $tz = Carbon::now()->tzName;
        // $date = $date->subHours(6);

        return view('dashboard.admin')->with(['date' => $date,'tz' => $tz,"users" => $users,"views" => $maxItem]);
       // return view('articles.blog',['articles' => $articles]);
    }
}