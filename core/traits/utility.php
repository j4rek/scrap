<?php
namespace core\traits;

trait utility{
	
	public static function dump($var){
		if($var){
			echo "<pre>";
		var_dump(str_replace("<", "|", str_replace(">", "|", $var)));
		echo "</pre>";	
		}else{
			echo "NO VAR PASSED";
		}

		exit();
	}

}