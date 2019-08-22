<?php
require_once("View/Block/Abstract.php");

class View_Block_Newsletter_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "newsletter/index";
        $this->setTemplate('newsletter/index.phtml');
    }
}
?>