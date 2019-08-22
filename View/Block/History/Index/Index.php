<?php
require_once("View/Block/Abstract.php");

class View_Block_History_Index_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "history/index_index";
        $this->setTemplate('history/index/index.phtml');
    }

    public function getCustomerData(){
    	$customerModel = Ccc::getModel('customer');
    	$customerData = $customerModel->getCustomerData();
    	return $customerData;
    }
}
?>
