<?php
require_once("View/Block/Abstract.php");

class View_Block_Link_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "link/index";
        $this->setTemplate('link/index.phtml');
    }

    public function getBreadCrumbs()
    {
    	$object = Ccc::getInstance("Controller_Abstract");
    	$routeName = $object->getRequest()->getControllerName();
    	$explodeName = explode("_", $routeName);
    	if(count($explodeName) == 1 && current($explodeName) == "index"){
    		return strtoupper("Dashboard");
    	}
    	else{
    		return strtoupper(current($explodeName));
    	}
    }
}
?>