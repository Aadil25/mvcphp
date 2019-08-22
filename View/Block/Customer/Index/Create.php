<?php
require_once("View/Block/Abstract.php");

class View_Block_Customer_Index_Create extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "customer/index_index";
        $this->setTemplate('customer/index/create.phtml');
    }
}
?>