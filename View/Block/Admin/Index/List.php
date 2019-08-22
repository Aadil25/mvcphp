<?php
require_once("View/Block/Abstract.php");

class View_Block_Admin_Index_List extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "admin/index_list";
        $this->setTemplate('admin/index/list.phtml');
    }

    protected function _prepareQuery()
    {
        $database = Ccc::getModel('database');
        $admin = Ccc::getModel("admin");
        $row = $database->fetchRow("select * from admin");
        return $row;
    }
    
    public function getCollection()
    {
        return $select = $this->_prepareQuery();
    }

    public function getPostUrl($path = null)
    {
		return $this->postUrl($path);	
    }
}
?>