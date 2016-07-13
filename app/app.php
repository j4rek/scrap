<?php
namespace app;

use core\parser;
use core\http;
use core\interfaces\iconfig;
use core\traits\utility;

class app implements iconfig{

	static function up(){
		// Set the page_number parameter
		http::$_ipage = "pagina";
		
		// Set how many pages you want to scrap
		http::$_pages_to_scrap = 9;
		
		// Set URL
		http::$_url = 'https://www.pcfactory.cl/?categoria=425&papa=735&pagina=1';
		
		// execute the parser
		parser::scrap(array('Notebook Inspiron 14 3000 Celeron N3050','$149.990'));
		
		//print the scrap result
		utility::dump(parser::$_texts);
	}
}