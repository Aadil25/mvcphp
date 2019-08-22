<?php
require_once("View/Block/Abstract.php");

class View_Block_Bill_Details_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "bill/details_list";
        $this->setTemplate('bill/details/list.phtml');
    }
}
?>