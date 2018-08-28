<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['first_nam','last_name','email'];
    
    public function articles(){
        return $this->hasMany('App\Article');
    }
    
    public function pages(){
        return $this->hasMany('App\Page');
    }

    public function getTrueValue($plan){
//        /dd($plan);
        //return $plan;
        
        if($plan === $this->is_admin){
            return true;
        }
    }

    /*public function getIsAdminAttribute()
	{
	    return true;
	}*/
}
