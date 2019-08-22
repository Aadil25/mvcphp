<?php
require_once("View/Block/Abstract.php");

class View_Block_Product_Index_Create extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "product/index_index";
        $this->setTemplate('product/index/create.phtml');  
    }
    
    /*public function getCategory()
    {
        $database = Ccc::getModel('database');
        $result = $database->fetchAll("select * from category");
        foreach($result as $value)
        {
            return $value['category_id'];
        }
    }*/  
}
?>