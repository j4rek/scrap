<?php
namespace core\interfaces;

interface iparser{

	const TAG 	= '<element>';
	const DI_TAG = '< >';
	const DF_TAG = '< />';

	/**
	 * Gets the content of website.
	 *
	 * @param      string  $url    The website's url
	 */
	static function readContent($url);

	/**
	 * Gets the attributes of the html element.
	 *
	 * @param      string  $element  The element
	 */
	static function getAttributes($element);

	/**
	 * find the DOM element container for the text
	 *
	 * @param      string  $text  The text you are looking for
	 */
	static function findElement($text);

	/**
	 * find the Text inside of DOM elements selected by $element_tag
	 * 
	 * @param 		string $element_tag  The element
	 */
	static function findTextElement($element_tag);

	/**
	 * find 1 or more parents of the element
	 *
	 * @param      string   $element  The selected element
	 * @param      integer  $levels   quantity of parents you want to get
	 */
	static function findParents($element, $levels = 1);

	/**
	 * get all the child nodes from the element parameter
	 *
	 * @param      string  $element  The selected element 
	 */
	static function findChilds($element);

	/**
	 * fill all the data process
	 *
	 * @param      string  $url    The website's url
	 * @param      array  $data    The information you are looking for inside the website
	 */
	static function parse($url, $data = array());

	/**
	 * display the resumen of process
	 *
	 * @param      string  $url    The website's url
	 */
	static function resumen($url);

	/**
	 * split the website's url
	 *
	 * @param     string  $url    The website's url
	 */
	static function splitUrl($url);
}