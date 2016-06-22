<?php
namespace core;

use core\interfaces\iparser;
use core\traits\utility;
use core\http;

class parser implements iparser{
	use utility;

	static $_content;
	static $_childs		= [];
	static $_parents	= [];
	static $_elements	= [];
	static $_texts		= [];
	static $_url;

	/**
	 * Gets the content of website.
	 *
	 * @param      string  $url    The website's url
	 */
	static function readContent($url){
		self::$_content = http::getPage($url);
	}

	/**
	 * Gets the attributes of the html element.
	 *
	 * @param      string  $element  The element
	 */
	static function getAttributes($element){

	}

	/**
	 * find the DOM element container for the text
	 *
	 * @param      string  $text  The text you are looking for
	 */
	static function findElement($text){
		## get the position of $text
		$ipos = stripos(self::$_content, $text);
		$fpos = $ipos + strlen($text);

		## get the position of html open tag container for $text
		$element_ipos = strrpos(substr(self::$_content, 0, $ipos), explode(" ", self::DI_TAG)[0]);
		$element_fpos = $element_ipos + ($ipos - $element_ipos);

		## get the tag name
		$tag_name = trim(substr(substr(self::$_content, $element_ipos, ($ipos - $element_ipos)), 0, (stripos(substr(self::$_content, $element_ipos, $ipos - $element_ipos), " ") - $element_fpos)));

		## get the tag		
		$tag = trim(substr(self::$_content, $element_ipos, $element_fpos - $element_ipos));

		return $tag;
	}

	/**
	 * find the Text inside of DOM elements selected by $element_tag
	 * 
	 * @param 		string $element_tag  The element
	 */
	static function findTextElement($element_tag){
		## get the position of element
		$ipos = stripos(self::$_content, $element_tag);
		
		utility::dump($ipos);

		$fpos = $ipos + strlen($text);

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
	 * fill all the data process
	 *
	 * @param      string  $url    The website's url
	 */
	static function parse($url, $data = array()){
		self::readContent($url);
		if(is_array($data)){
			foreach ($data as $key => $value) {
				array_push(self::$_elements, self::findTextElement(self::findElement($value)));
			}
		}else{
			array_push(self::$_elements, self::findTextElement(self::findElement($data)));
		}
	}

	/**
	 * display the resumen of process
	 *
	 * @param      string  $url    The website's url
	 */
	static function resumen($url){

	}

	/**
	 * split the website's url
	 *
	 * @param     string  $url    The website's url
	 */
	static function splitUrl($url){

	}
}