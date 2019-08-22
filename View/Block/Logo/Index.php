<?php
require_once("View/Block/Abstract.php");

class View_Block_Logo_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "logo/index";
        $this->setTemplate('logo/index.phtml');
    }
}
?>