<?php
require_once("View/Block/Abstract.php");

class View_Block_Error_Error extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "error/error";
        $this->setTemplate('error/error.phtml');
    }
}
?>