<?php
require_once "Model/Abstract.php";
class Model_Http extends Model_Abstract
{
    public function getWebsiteUrl()
    {
        $host  = (isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:'');
        $proto = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=="off") ? 'https' : 'http';
        $scriptPath = (isset($_SERVER['SCRIPT_NAME'])?$_SERVER['SCRIPT_NAME']:'');
        return $proto."://".$host.$scriptPath;
    }
    
}    
?>