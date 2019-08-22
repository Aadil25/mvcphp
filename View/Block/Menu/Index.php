<?php
require_once("View/Block/Abstract.php");

class View_Block_Menu_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "menu/index";
        $this->setTemplate('menu/index.phtml');
    }
}
?>