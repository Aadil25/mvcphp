<?php
require_once("View/Block/Abstract.php");

class View_Block_Service_Index_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "service/index_index";
        $this->setTemplate('service/index/index.phtml');
    }
}
?>
