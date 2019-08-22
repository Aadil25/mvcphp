<?php
require_once("View/Block/Abstract.php");

class View_Block_Catalog_Index_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "catalog/index_list";
        $this->setTemplate('catalog/index/list.phtml');
    }
}
?>