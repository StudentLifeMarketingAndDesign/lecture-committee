<?php

class PreviousPage extends Page {
	
	private static $db = array(
	);
	
	private static $has_one = array(
	);
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}
}
 
class PreviousPage_Controller extends Page_Controller {
	
	function init() {
		parent::init();
	}
	
}
?>