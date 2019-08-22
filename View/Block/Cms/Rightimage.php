<?php
require_once("View/Block/Abstract.php");

class View_Block_Cms_Rightimage extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "cms/rightimage";
        $this->setTemplate('cms/rightimage.phtml');
    }
}
?>