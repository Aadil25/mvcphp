<?php
require_once("View/Block/Abstract.php");

class View_Block_Bill_Index_Create extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "bill/index_index";
        $this->setTemplate('bill/index/create.phtml');
    }

    public function getBrandNames(){
    	$vehical = Ccc::getModel("vehical");
    	$brandnames = $vehical->getBrandNames();
    	$jsonArray = array();
    	$brandArray = array();
    	$modelArray = array();
    	foreach ($brandnames as $key => $value) {

    		$brandArray[] = $value['brand_name'];
    		$modelArray[] = $value['model_name'];
    	}
    	$jsonArray["brand_array"] = json_encode($brandArray);
    	$jsonArray["model_array"] = json_encode($modelArray);
    	return $jsonArray;
    }
}
?>