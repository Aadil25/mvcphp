<?php
require_once("View/Block/Abstract.php");

class View_Block_Bill_View_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "bill/view_index";
        $this->setTemplate('bill/view/index.phtml');
    }
}
?>
