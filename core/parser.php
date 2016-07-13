<?php
namespace core;

use core\interfaces\iparser;
use core\traits\utility;
use core\http;

class parser implements iparser{
	static $_content;
	static $_tag;
	static $_childs		= [];
	static $_parents	= [];
	static $_elements	= [];
	static $_attributes = [];
	static $_texts		= [];

	static $_tag_name	= "";
	static $_initial;

	/**
	 * Gets the attributes of the html element.
	 *
	 * @param      string  $element  The element
	 */
	static function getAttributes($element){
		## get the tag name
		self::$_tag_name = trim(substr(str_replace(explode(" ", self::DI_TAG)[0], "", $element), 0, stripos($element, " ")));
	}

	/**
	 * find the DOM element container for the text
	 *
	 * @param      string  $text  The text you are looking for
	 */
	static function findElement($text){
		## get the position of $text
		$ipos = stripos(self::$_content, explode(" ", self::DI_TAG)[1].$text);
		if($ipos !== false){
			$fpos = $ipos + strlen($text);

			## get the position of html open tag container for $text
			$element_ipos = strrpos(substr(self::$_content, 0, $ipos), explode(" ", self::DI_TAG)[0]);
			$element_fpos = $element_ipos + ($ipos - $element_ipos);

			## get the tag		
			$tag = trim(substr(self::$_content, $element_ipos, $element_fpos - $element_ipos));
		}else{
			return false;
		}
		
		return $tag;
	}

	/**
	 * find the Text inside of DOM elements selected by $element_tag
	 * 
	 * @param 		string $element_tag  The element
	 */
	static function findTextElement($element_tag){
		## close tag
		self::getAttributes($element_tag);
		$tag_name_close = str_replace(" ", self::$_tag_name, self::DF_TAG);

		## get the position of element
		$ipos = stripos(self::$_content, $element_tag);
		if($ipos !== false){
			$fpos = stripos(self::$_content, $tag_name_close, $ipos);

			## get the Text inside the element
			$content = substr(self::$_content, $ipos, $fpos - $ipos).$tag_name_close;
			$text = str_replace($element_tag, "", str_replace($tag_name_close, "", $content));

			## remove the entire element from body content
			self::$_content = str_replace($content, "", self::$_content);

			array_push(self::$_texts, $text);
			return true;
		}else{
			return false;
		}
	}

	/**
	 * find 1 or more parents of the element
	 *
	 * @param      string   $element  The selected element
	 * @param      integer  $levels   quantity of parents you want to get
	 */
	static function findParents($element, $levels = 1){

	}

	/**
	 * get all the child nodes from the element parameter
	 *
	 * @param      string  $element  The selected element 
	 */
	static function findChilds($element){

	}
	
	/**
	 * scrap function.
	 * 
	 * @param 		Array $data  The elements you want to scrap
	 * @return void
	 */
	static function scrap($data = array()){
		// parse the website many times as you set the number of pages
		for($i = 1; $i <= http::$_pages_to_scrap; $i++){
			
			// analize url
			http::analizeUrl();
			
			http::$_url = str_replace(http::$_ipage . "=" . http::$_pagenumber, http::$_ipage . "=" . $i , http::$_url);
			
			// Get the body from website
			$content = self::$_content = http::getPage();
			
			
			// parse the body of website
			self::parse($data);	
		}
		
	}

	/**
	 * fill all the data process
	 *
	 * @param      array  $data    The information you are looking for inside the website
	 */
	static function parse($data = array()){
		if(is_array($data)){
			foreach ($data as $key => $value) {
				if(is_null(self::$_tag) === true){
					self::$_tag = self::findElement(trim($value));
				}
				do{
					$found = self::findTextElement(self::$_tag);
				}
				while($found);
			}
		}else{
			if(is_null(self::$_tag) === true){
				self::$_tag = self::findElement(trim($data));
			}
			do{
				$found = self::findTextElement(self::$_tag);
			}
			while($found);
		}
		
	}

	/**
	 * display the resumen of process
	 *
	 * @param      string  $url    The website's url
	 */
	static function resumen($url){

	}
}