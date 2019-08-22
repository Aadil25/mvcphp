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
}
?>