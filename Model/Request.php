<?php
require_once "Model/Abstract.php";
class Model_Request extends Model_Abstract
{
    const DEFAULT_CONTROLLER = "index";
    const DEFAULT_ACTION = "index";
    
    protected $_controller = null;
    protected $_action = null;
    
    public function createSession(){
        session_start();
    }

    /**
     * Set SESSION values
     *
     * @param  string|array $spec
     * @param  null|mixed $value
     * @return Zend_Controller_Request_Http
     */
    public function setSession($spec, $value = null)
    {
        if ((null === $value) && !is_array($spec)) {
            //require_once 'Zend/Controller/Exception.php';
            throw new Exception('Invalid value passed to setSession(); must be either array of values or key/value pair');
        }
        if ((null === $value) && is_array($spec)) {
            foreach ($spec as $key => $value) {
                $this->setPost($key, $value);
            }
            return $this;
        }
        $_SESSION[(string) $spec] = $value;
        return $this;
    }

    /**
     * Retrieve a member of the $_SESSION superglobal
     *
     * If no $key is passed, returns the entire $_SESSION array.
     *
     * @todo How to retrieve from nested arrays
     * @param string $key
     * @param mixed $default Default value to use if key not found
     * @return mixed Returns null if key does not exist
     */
    public function getSession($key = null, $default = null)
    {
        if (null === $key) {
            return $_SESSION;
        }

        return (isset($_SESSION[$key])) ? $_SESSION[$key] : $default;
    }

    public function getParams() 
    {
        return $_REQUEST;
    }
    public function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            return true;
        }
        return false;
    }
    
    public function getPost()
    {
        return $this->getParams();
    }
    
    public function getParam($key, $default = null)
    {
        
        if(!$key)
        {
            return $default;
        }
        
        $data = $this->getParams();
        
        if(array_key_exists($key,$data)) 
        {   
            return $data[$key];  
        }
        return $default;
    }
    
    public function setActionName($action = null)
    {
        if($action != null)
        {
            $this->_action = $action;
        }
        return $this;
    }
    
    public function getActionName()
    {
        if($this->_action)
        {
            return $this->_action;
        }
        return $this->getParam('action',self::DEFAULT_ACTION);
    }
    
    public function setControllerName($controller = null)
    {
        if($controller != null)
        {
            $this->_controller = $controller;
        }
        return $this;
    }
    
    public function getControllerName()
    {
        if($this->_controller)
        {
            return $this->_controller;
        }
        return $this->getParam('controller',self::DEFAULT_CONTROLLER);
    }
}    
?>