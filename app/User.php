<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    public function articles(){
        return $this->hasMany('App\Article');
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
