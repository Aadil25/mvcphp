<?php
require_once "Abstract.php";

class Controller_ErrorController extends Controller_Abstract
{
    public function errorAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('error/error'));
    }
}
?>