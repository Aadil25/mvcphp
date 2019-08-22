<?php
require_once("View/Block/Abstract.php");

class View_Block_Admin_Index_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "admin/index_index";
        $this->setTemplate('admin/index/index.phtml');
    }
}
?>