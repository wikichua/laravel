<?php namespace Libraries\Helpers;
use Illuminate\Support\Facades\DB;

class Helpers {

  public static function RandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

	public static function LastQuery()
	{
		$queries = DB::getQueryLog();
		$last_query = end($queries);
		var_dump($last_query);
	}
}
