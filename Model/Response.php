<?php
require_once "Model/Abstract.php";
class Model_Response extends Model_Abstract
{
    public function setBody($content)
    {  
        echo $content;
    }
    
    public function sendHeaders($headername,$url)
    {    
        header(ucfirst($headername).":".$url);
    }
}    
?>