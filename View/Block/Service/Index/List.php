<?php
require_once("View/Block/Abstract.php");

class View_Block_Service_Index_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "service/index_list";
        $this->setTemplate('service/index/list.phtml');
    }
}
?>