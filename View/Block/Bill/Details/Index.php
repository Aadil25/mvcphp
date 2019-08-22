<?php
require_once("View/Block/Abstract.php");

class View_Block_Bill_Details_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "bill/details_index";
        $this->setTemplate('bill/details/index.phtml');
    }

    public function getAllData(){
    	$requestModel = Ccc::getModel('request');
    	$sessionData = $requestModel->getSession();
    	return $sessionData;
    }
}
?>
