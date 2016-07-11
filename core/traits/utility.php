<?php
namespace core\traits;

trait utility{
	
	/**
	 * print var on screen
	 *
	 * @param      ANY 	$var    The variable
	 * @param      bool $finish    if true script ends
	 */
	public static function dump($var, $finish = true){
		if(isset($var)){
			echo "<pre>";
			var_dump(str_replace("<", "|", str_replace(">", "|", $var)));
			echo "</pre>";
		}else{
			echo "NO VAR PASSED";
		}
		if($finish){
			exit();
		}
	}

}