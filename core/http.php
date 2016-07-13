<?php
namespace core;

use core\interfaces\ihttp;
use core\traits\utility;

class http implements ihttp{
	
	static $_url;
	static $_ipage;
	static $_pagenumber;
	static $_pages_to_scrap;
	
	/**
	 * Get the content of website
	 * 
	 * @param		string $url the website's url
	 * @return void
	 */
	static function getPage(){
		if(isset(self::$_url)){
			$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, self::$_url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $contenido = curl_exec($ch);
	        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	        curl_close($ch); 
	
			if($httpCode != "200"){
				exit("Couldn't load the website $url.");
			}	
		}else{
			exit("Website URL is not defined.");
		}

		return $contenido;
	}
	
	/**
	 * analize the website's url
	 *
	 * @param     string  $url    The website's url
	 */
	static function analizeUrl(){
		parse_str(explode("?", self::$_url)[1], $urlParts);
		
		self::$_pagenumber = $urlParts[self::$_ipage];
	}
}