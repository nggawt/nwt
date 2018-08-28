<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
class Article extends Model
{
    
     use FormAccessible;
     
    protected  $fillable =['user_id','title','body','excerpt','published_at'];
    
    protected $dates = ['published_at'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag','article_tag');
    }
    
    public function getTagListAttribute(){
        return $this->tags->lists('id');
    }
    
   /* public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::now();
    }*/
    
//    public function setCreatedAtAttribute($date){
//        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date)->addHour(3);
//    }
//    
//    public function setUpdatesdAttribute($date){
//        $this->attributes['updated_at'] = Carbon::createFromFormat('Y-m-d', $date)->addHour(3);
//    }
}