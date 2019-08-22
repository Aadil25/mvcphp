<?php
require_once("View/Block/Abstract.php");

class View_Block_Catalog_Index_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "catalog/index_index";
        $this->setTemplate('catalog/index/index.phtml');
    }
}
?>