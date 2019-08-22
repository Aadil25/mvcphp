<?php
require_once("View/Block/Abstract.php");

class View_Block_Category_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "category/index";
        $this->setTemplate('category/index.phtml');
    }
}
?>