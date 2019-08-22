<?php
require_once("View/Block/Abstract.php");

class View_Block_Product_Index_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "product/index_index";
        $this->setTemplate('product/index/index.phtml');
    }
}
?>