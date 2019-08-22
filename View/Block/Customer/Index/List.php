<?php
require_once("View/Block/Abstract.php");

class View_Block_Customer_Index_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "customer/index_list";
        $this->setTemplate('customer/index/list.phtml');
    }
}
?>