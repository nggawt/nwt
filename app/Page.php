<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['owner','user_id','page_id','hierarchy','page_name','title','body','url'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getPageListAttribute($param = null){

		/********all Pages************/    
		$param = $param ? $this->where($param, 'main')->get()->lists('page_name','id') : $this->lists('page_name','id');
    	return $param->toArray();

    	/********By User loged in********/

    	/*$logUser = auth()->user();
    	$logUser->pages->lists('page_name')->toArray();*/
    }
}
