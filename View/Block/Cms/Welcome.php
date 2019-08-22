<?php
require_once("View/Block/Abstract.php");

class View_Block_Cms_Welcome extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "cms/welcome";
        $this->setTemplate('cms/welcome.phtml');
    }
}
?>