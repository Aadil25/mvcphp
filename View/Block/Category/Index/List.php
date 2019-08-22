<?php
require_once("View/Block/Abstract.php");

class View_Block_Category_Index_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "category/index_list";
        $this->setTemplate('category/index/list.phtml');
    }
}
?>