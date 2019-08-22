<?php
require_once("View/Block/Abstract.php");

class View_Block_Product_Index_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "product/index_list";
        $this->setTemplate('product/index/list.phtml');
    }
}
?>