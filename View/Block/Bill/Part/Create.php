<?php
require_once("View/Block/Abstract.php");

class View_Block_Bill_Part_Create extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "bill/part_index";
        $this->setTemplate('bill/part/create.phtml');
    }
}
?>