<?php
namespace app;

use core\parser;
use core\interfaces\iconfig;

class app implements iconfig{

	static function up(){
		parser::parse("http://www.boosmap.com/rubros/comida-rapida/comercios/mcdonalds/productos",'$4.440');
	}
}