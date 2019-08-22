<?php
require_once("Abstract.php");

class View_Block_Core_Layout extends View_Block_Core_Abstract
{
    protected $_head;
    protected $_header;
    protected $_content;
    protected $_menu;
    protected $_left;
    protected $_right;
    protected $_footer;
    protected $_message;
    protected $_navbar;
    
    protected $_layoutDisable = false;
    
    public function __construct()
    {
        parent::__construct();
        $this->_name = "core/layout";
        $this->setTemplate($this->pageWiseTemplate());
        
    }
    
    public function pageWiseTemplate()
    {
        if(Ccc::getModel('request')->getParam('controller') == "bill_view"){
            return 'core/printlayout.phtml';
        }else{
            return 'core/3columns.phtml';
        }
    }

    public function disableLayout($disable = false)
    {   
        $this->_layoutDisable = $disable;
    }
    
    public function isDisableLayout()
    {
        if($this->_layoutDisable)
        {
            return true;
        }
        else
        {
            return false;
        }
    } 
    
    public function setHead($head = null)
    {   
        if($head != null)
        {
            $this->_head = $head;
        }
        return $this;
    }
    
    public function getHead()
    {
        if($this->_head)
        {
            return $this->_head;
        }
        return $this;
    }
    
    public function getHeadHtml()
    {
        return $this->getHead()->toHtml();
    }
    
    public function setHeader($header = null)
    {
        if($header != null)
        {       
            $this->_header = $header;
        }
        
        return $this;
    }
    
    public function getHeader()
    {
        if($this->_header)
        {   
            return $this->_header;
        }
        return $this;
    }
    
    public function getHeaderHtml()
    {   
        return $this->getHeader()->toHtml();
    }

    /*navbar*/
    public function setNavbar($navbar = null)
    {
        if($navbar != null)
        {       
            $this->_navbar = $navbar;
        }
        
        return $this;
    }
    
    public function getNavbar()
    {
        if($this->_navbar)
        {   
            return $this->_navbar;
        }
        return $this;
    }
    
    public function getNavbarHtml()
    {   
        return $this->getNavbar()->toHtml();
    }
    /*navbar*/
    
    public function setContent($content = null)
    {    
        if($content != null)
        {    
            $this->_content = $content;
        }
        return $this;
    }
    
    public function getContent()
    {
        if($this->_content)
        {   
            return $this->_content;
        }
        return $this;
    }
    
    public function getContentHtml()
    {
        return $this->getContent()->toHtml();
    }
    
    public function setMenu($menu = null)
    {
        if($menu != null)
        {
            $this->_menu = $menu;
        }
        return $this;
    }
    
    public function getMenu()
    {
        if($this->_menu)
        {
            return $this->_menu;
        }
        return $this;
    }
    
     public function setLeft($left = null)
    {
        if($left != null)
        {   
            $this->_left = $left;
        }
        return $this;
    }
    
    public function getLeft()
    {
        if($this->_left)
        {
            return $this->_left;
        }
        return $this;
    }
    
    public function getLeftHtml()
    {
        return $this->getLeft()->toHtml();
    }
    
    public function setRight($right = null)
    {
        if($right != null)
        {
            $this->_right = $right;
        }
        return $this;
    }
    
    public function getRight()
    {
        if($this->_right)
        {    
            return $this->_right;
        }
        return $this;
    }
    
    public function getRightHtml()
    {
        return $this->getRight()->toHtml();
    }
    
    public function setFooter($footer = null)
    {
        if($footer != null)
        {
            $this->_footer = $footer;
        }
        return $this;
    }
    
    public function getFooter()
    {
        if($this->_footer)
        {
            return $this->_footer;
        }
        return $this;
    }
    
    public function getFooterHtml()
    {
        return $this->getFooter()->toHtml();
    }
    
    public function setMessage($message = null)
    {
        if($message != null)
        {
            $this->_message = $message;
        }
        return $this;
    }
    
    public function getMessage()
    {
        if($this->_message)
        {
            return $this->_message;
        }
        return $this;
    }
}
?>
