<?php
require_once("View/Block/Abstract.php");

class View_Block_Bill_View_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "bill/view_list";
        $this->setTemplate('bill/view/list.phtml');
    }

    public function getAllData(){
    	$requestModel = Ccc::getModel('request');
    	$sessionData = $requestModel->getSession();
    	return $sessionData;
    }
}
?>