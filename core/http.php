<?php
namespace core;

class http{

	static function getPage($url){
		$contenido = file_get_contents($url);

		return $contenido;
	}
}