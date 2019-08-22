<?php
require_once("View/Block/Abstract.php");

class View_Block_Category_Index_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "category/index_index";
        $this->setTemplate('category/index/index.phtml');
    }
}
?>