<?php 
namespace App\Http\ViewComposers;

// use View;
use \Carbon\Carbon;
use Redis;

class RedisComposer
{
	
	public function compose(){
		$dt = Carbon::now();
		
		$route = url()->current();

		//dd(route('home'));

		//dd(str_contains($route,"https"));

		$route = str_contains($route,"https")? explode('nggawt/', $route) : explode('8080/', $route);

		//dd($route);
		$route = isset($route[1])?$route[1]:'wellcome';

/*		// $pageInc = "1";
		if(! Redis::EXISTS("visits:1:1:2017")){
			$copy = $dt->copy();
			for ($ii=1; $ii <= 12; $ii++) { 

				$copy->month = $ii;
				$dyInMonth = $copy->daysInMonth;
				if($ii <= $dt->month){

					for ($iii=1; $iii <= $dyInMonth; $iii++) { 
						$rand = rand(10, 100);
						$pageInc = Redis::zincrby("visits:".$iii.":".$ii.":".$dt->year ,$rand,$route);
						if($dt->day == $iii && $dt->month == $copy->month){
							break;
						}
						
					}
				}else{
					break;
				}
			}
		}else{
				$pageInc = Redis::zincrby("visits:".$dt->day.":".$dt->month.":".$dt->year ,1,$route);
		}
*/
		$isTrue = true;

		if(! Redis::EXISTS("visits:" . $route)){
			$copy = $dt->copy();
			for ($ii=1; $ii <= 12; $ii++) { 

				$copy->month = $ii;
				$dyInMonth = $copy->daysInMonth;
				if($ii <= $dt->month){

					for ($iii=1; $iii <= $dyInMonth; $iii++) { 
						$rand = rand(10, 100);
						$pageInc = Redis::zincrby("visits:".$route,$rand,$iii.":".$ii.":".$dt->year);
						//if($iii === 1 && 1 === $copy->month) dd(Redis::zrange("visits:".$route,0,-1,"WITHSCORES"));
						if($dt->day == $iii && $dt->month == $copy->month){
							break;
						}
						
					}
				}else{
					break;
				}
			}
			dd("ffgfggf");
		}else{
			$pageInc = Redis::zincrby("visits:".$route ,1,$dt->day.":".$dt->month.":".$dt->year);
			// dd($pageInc);
		}
		
		//dd(Redis::zrange("visits:portfolio",0,-1,'WITHSCORES'));

		//$sorted = Redis::keys('visits*');
		//arsort($sorted);
		//dd($sorted);
		/*
		for ($iii=1; $iii < $dd; $iii++) { 
			$pageInc = Redis::zincrby("visits:".$iii.":".$this->month.":".$this->year ,1,$route);
		}*/

		// dd($pageInc);
		view()->share(['pageInc' => $pageInc,'currentUrl' => $route]);
		//. ": " . Carbon::now()->format('m.Y.h.i.s')
		

		//$data = Redis::keys('visits*');
		// $dt->day    = 9;
		 //$data = Redis::zrange($data[0],0,-1,'WITHSCORES');
		 // dd($this->year);
		// if(empty(Redis::keys("visits*"))){
			// $dt->month = 8;
		// 365 + $dt->format('L')
			//dd($dt->daysInYear);

		/*for ($ii=($this->day - $this->dayWeek); $ii <= $this->day; $ii++) { 
			
			$pageInc = Redis::zincrby("visits:".$ii.":".$this->month.":".$this->year ,1,$route);
		}*/

		/*for ($ii=1; $ii <= $dt->daysInMonth; $ii++) { 
			
			$pageInc = Redis::zincrby("visits:".$ii.":".$this->month.":".$this->year ,1,$route);
		}*/

		// for ($ii=0; $ii <= 365; $ii++) { 
					
		// 	$pageInc = Redis::zincrby("visits:".$ii.":".$this->month.":".$this->year ,1,$route);
		// }
		// }
	}
}