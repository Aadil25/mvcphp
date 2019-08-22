<?php
require_once("View/Block/Abstract.php");

class View_Block_Pages_Html_Head extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "pages/html_head";
        $this->setTemplate('pages/html/head.phtml');
    }
}

?>