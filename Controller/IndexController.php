<?php
require_once "Abstract.php";

class Controller_IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        $this->getLayout()->getContent()
                          //->setBlock(Ccc::getBlock('cms/welcome'));
        				->setBlock(Ccc::getBlock('bill/index_create'));
                         // ->setBlock(Ccc::getBlock('cms/text'));
    }
}

?>