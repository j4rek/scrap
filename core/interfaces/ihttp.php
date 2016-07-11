<?php
namespace core\interfaces;

interface ihttp{

	/**
	 * Get the content of website
	 * 
	 * @return void
	 */
	static function getPage();
	
	/**
	 * analize the website's url
	 *
	 * @param     string  $url    The website's url
	 */
	static function analizeUrl();
		
}