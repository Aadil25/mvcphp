<?php
require_once("View/Block/Abstract.php");

class View_Block_Bill_Part_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "bill/part_list";
        $this->setTemplate('bill/part/list.phtml');
    }
}
?>