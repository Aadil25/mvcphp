<?php
require_once("View/Block/Abstract.php");

class View_Block_Cms_Text extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "cms/text";
        $this->setTemplate('cms/text.phtml');
    }
}
?>