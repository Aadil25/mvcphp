<?php
class View_Block_Abstract
{
    const BASE_PATH = "View/Block/";
    Const SCRIPT_PATH = "View/Script/";
    
    protected $_template = null;
    protected $_blocks = array();
    public $_name;
    
    public function __construct()
    {
        
    }
    
    public function setTemplate($template)
    {
        if(null === $template)
        {
            echo('"$template" should not be null or empty.');die;
        }
    
        $this->_template = $template;
       
        return $this;
    }
    
    public function getTemplate()
    {
        return $this->_template;
    }
    
    public function toHtml()
    {
        $file = $this->getTemplate();
        if(null === $file)
        {
            echo('"$file" should not be null or empty.');die;
        }
        
        $path = self::SCRIPT_PATH.$file;
        if(!file_exists($path))
        {
            echo "file not exits";die;
        }
        
        ob_start();
        require($path);
        return ob_get_clean();
    }
    
    public function setBlock($block)
    {
        if($block instanceof View_Block_Abstract)
        {    //print_r($block);die;
            $this->_blocks[$block->_name] = $block;
        }
        elseif(string($block))
        {
            $_block = Ccc::getBlock($block);
            $this->_blocks[$_block->_name] = $_block;
        } 
        return $this;
    }
    
    public function getBlock($block)
    {
        if(!$block)
        {
            echo ("$block is not empty or null");die;
        }
        if(array_key_exists($block,$this->_block))
        {
            return $this->_blocks[$block];
        }
        else
        {
            return Ccc::getBlock($block);    
        }
    }  
    
    public function setBlocks($blocks)
    {       
        if(!is_array($blocks))
        {
            echo ("$blocks is not a array");die;
        }
        $this->_blocks = $blocks;
        return $this;
    } 
    
    public function getBlocks()
    {    
        return $this->_blocks;
    }
    
    public function getBlockCount()
    { 
        return count($this->getBlocks());
    }

    public function postUrl($path)
    {
        $controllerArray = explode("/", $path);
        $controller = Ccc::getController($controllerArray[0]);
        if($controller == false){
            return $this->getBaseUrl()."index.php?controller=error&action=error";
        }
        else{
            return $this->getBaseUrl()."index.php?controller=".$controllerArray[0]."&action=".$controllerArray[1];
        }
    }

    public function getBaseUrl()
    {
        $currentPath = $_SERVER['PHP_SELF']; 
        $pathInfo = pathinfo($currentPath); 
        $hostName = $_SERVER['HTTP_HOST']; 
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
        return $protocol.$hostName.$pathInfo['dirname']."/";
    }
}    
?>
