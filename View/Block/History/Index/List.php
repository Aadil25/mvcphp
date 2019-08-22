<?php
require_once("View/Block/Abstract.php");

class View_Block_History_Index_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "history/index_list";
        $this->setTemplate('history/index/list.phtml');
    }
}
?>