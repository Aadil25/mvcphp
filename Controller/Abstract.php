<?php
class Controller_Abstract
{
    const BASE_PATH = "Controller/";
    
    const DEFAULT_ACTION = "index";
    const ERROR_CONTROLLER = "error";
    const ERROR_ACTION = "error";
    
    const HEADER_NAME = "Location";
    
    protected $_layout;
    protected $_request = null;
    protected $_response = null;
    protected $_http = null;

    /**
     * Scheme for http
     *
     */
    const SCHEME_HTTP  = 'http';

    /**
     * Scheme for https
     *
     */
    const SCHEME_HTTPS = 'https';

    /**
     * Allowed parameter sources
     * @var array
     */
    protected $_paramSources = array('_GET', '_POST');

    /**
     * REQUEST_URI
     * @var string;
     */
    protected $_requestUri;

    /**
     * Base URL of request
     * @var string
     */
    protected $_baseUrl = null;

    /**
     * Base path of request
     * @var string
     */
    protected $_basePath = null;

    /**
     * PATH_INFO
     * @var string
     */
    protected $_pathInfo = '';

    /**
     * Instance parameters
     * @var array
     */
    protected $_params = array();

    /**
     * Raw request body
     * @var string|false
     */
    protected $_rawBody;

    /**
     * Alias keys for request parameters
     * @var array
     */
    protected $_aliases = array();
    
    public function __construct()
    {    
        return $this;   
    }
    
    public function init()
    {
        
        $this->preDispatch();
          
        $action = $this->getRequest()->getActionName();
        $action = $action."Action";
        $this->$action();
        
        $this->postDispatch();
        
        if(!$this->getLayout()->isDisableLayout())
        { 
            $this->getResponse()->setBody($this->getLayout()->toHtml());    
        }  
    }
    
    public function preDispatch()
    {
        $this->setRequest();
        $this->setResponse();
        $this->setHttp();
        
        $this->setLayout('core/layout'); 
        $this->getLayout()->setHead(Ccc::getBlock('pages/html_head'));
        $this->getLayout()->setFooter(Ccc::getBlock('pages/html_footer'));
        $this->getLayout()->setHeader(Ccc::getBlock('pages/html_header'));
        $this->getLayout()->setNavbar(Ccc::getBlock('link/index'));
        $this->getLayout()->setLeft(Ccc::getBlock('pages/html_left'));
        $this->getLayout()->setRight(Ccc::getBlock('pages/html_right'));
        $this->getLayout()->setContent(Ccc::getBlock('pages/html_content'));
         
        $this->getLayout()->getHeader()
                          ->setBlock(Ccc::getBlock('logo/index'))
                          //->setBlock(Ccc::getBlock('link/index'))
                          ->setBlock(Ccc::getBlock('menu/index'));
                          
        $this->getLayout()->getLeft();
                          /*->setBlock(Ccc::getBlock('cms/leftimage'))
                          ->setBlock(Ccc::getBlock('newsletter/index'));*/
                          
        $this->getLayout()->getRight();
                          /*->setBlock(Ccc::getBlock('cms/text'))
                          ->setBlock(Ccc::getBlock('cms/rightimage'));   */
    }
    
    public function postDispatch()
    {
        
    }
    
    public function setLayout($layout = null)
    {
        if($layout != null)
        {
            $this->_layout = Ccc::getBlock($layout);
           
            return $this;
        }
        return null;
    }
    
    public function getLayout()
    {
        if($this->_layout) 
        { 
            return $this->_layout;
        }
        return $this;
    }
    
    public function __call($method,$args)
    {       
        if($method != self::ERROR_ACTION)
        {
            $this->redirect(self::ERROR_CONTROLLER,self::ERROR_ACTION);
        }
        echo "$method does not exist";die;
    }
    
    public function setRequest()
    {    
        $this->_request = Ccc::getModel('request');
        return $this;
    }
    public function getRequest()
    {
        if($this->_request != null)
        {
            return $this->_request;
        }
        $this->_request = Ccc::getModel('request');
        return $this->_request;
    }
    
    public function setResponse()
    {
        $this->_response = Ccc::getModel('response');
        return $this;
    }
    
    public function getResponse()
    {
        if($this->_response != null)
        {
            return $this->_response;
        }
        $this->_response = Ccc::getModel('response');
        return $this->_response;
    }
    
    public function setHttp()
    {
        $this->_http = Ccc::getModel('http');
        
        return $this;
    }
    
    public function getHttp()
    {
        if($this->_http != null)
        {   
            return $this->_http;
        }
        $this->_http = Ccc::getModel('http');
        return $this->_http;
    }
    
    public function redirect($controllerName,$actionName)
    {
        $url = $this->getHttp()->getWebsiteUrl()."?controller={$controllerName}&action={$actionName}";
        $this->getResponse()->sendHeaders(self::HEADER_NAME,$url);
    }

    /**
     * Retrieve a member of the $_SERVER superglobal
     *
     * If no $key is passed, returns the entire $_SERVER array.
     *
     * @param string $key
     * @param mixed $default Default value to use if key not found
     * @return mixed Returns null if key does not exist
     */
    public function getServer($key = null, $default = null)
    {
        if (null === $key) {
            return $_SERVER;
        }

        return (isset($_SERVER[$key])) ? $_SERVER[$key] : $default;
    }
    
    /**
     * Set allowed parameter sources
     *
     * Can be empty array, or contain one or more of '_GET' or '_POST'.
     *
     * @param  array $paramSoures
     * @return Zend_Controller_Request_Http
     */
    public function setParamSources(array $paramSources = array())
    {
        $this->_paramSources = $paramSources;
        return $this;
    }

    /**
     * Get list of allowed parameter sources
     *
     * @return array
     */
    public function getParamSources()
    {
        return $this->_paramSources;
    }

    /**
     * Set POST values
     *
     * @param  string|array $spec
     * @param  null|mixed $value
     * @return Zend_Controller_Request_Http
     */
    public function setPost($spec, $value = null)
    {
        if ((null === $value) && !is_array($spec)) {
            //require_once 'Zend/Controller/Exception.php';
            throw new Exception('Invalid value passed to setPost(); must be either array of values or key/value pair');
        }
        if ((null === $value) && is_array($spec)) {
            foreach ($spec as $key => $value) {
                $this->setPost($key, $value);
            }
            return $this;
        }
        $_POST[(string) $spec] = $value;
        return $this;
    }

    /**
     * Retrieve a member of the $_POST superglobal
     *
     * If no $key is passed, returns the entire $_POST array.
     *
     * @todo How to retrieve from nested arrays
     * @param string $key
     * @param mixed $default Default value to use if key not found
     * @return mixed Returns null if key does not exist
     */
    public function getPost($key = null, $default = null)
    {
        if (null === $key) {
            return $_POST;
        }

        return (isset($_POST[$key])) ? $_POST[$key] : $default;
    }

    /**
     * Get an action parameter
     *
     * @param string $key
     * @param mixed $default Default value to use if key not found
     * @return mixed
     */
    public function getParam($key, $default = null)
    {
        $key = (string) $key;
        if (isset($this->_params[$key])) {
            return $this->_params[$key];
        }

        return $default;
    }

    /**
     * Retrieve only user params (i.e, any param specific to the object and not the environment)
     *
     * @return array
     */
    public function getUserParams()
    {
        return $this->_params;
    }

    /**
     * Retrieve a single user param (i.e, a param specific to the object and not the environment)
     *
     * @param string $key
     * @param string $default Default value to use if key not found
     * @return mixed
     */
    public function getUserParam($key, $default = null)
    {
        if (isset($this->_params[$key])) {
            return $this->_params[$key];
        }

        return $default;
    }

    /**
     * Set an action parameter
     *
     * A $value of null will unset the $key if it exists
     *
     * @param string $key
     * @param mixed $value
     * @return Zend_Controller_Request_Abstract
     */
    public function setParam($key, $value)
    {
        $key = (string) $key;

        if ((null === $value) && isset($this->_params[$key])) {
            unset($this->_params[$key]);
        } elseif (null !== $value) {
            $this->_params[$key] = $value;
        }

        return $this;
    }

    /**
     * Get all action parameters
     *
     * @return array
     */
     public function getParams()
     {
         return $this->_params;
     }

    /**
     * Set action parameters en masse; does not overwrite
     *
     * Null values will unset the associated key.
     *
     * @param array $array
     * @return Zend_Controller_Request_Abstract
     */
    public function setParams(array $array)
    {
        $this->_params = $this->_params + (array) $array;

        foreach ($array as $key => $value) {
            if (null === $value) {
                unset($this->_params[$key]);
            }
        }

        return $this;
    }

    /**
     * Unset all user parameters
     *
     * @return Zend_Controller_Request_Abstract
     */
    public function clearParams()
    {
        $this->_params = array();
        return $this;
    }

    /**
     * Set a key alias
     *
     * Set an alias used for key lookups. $name specifies the alias, $target
     * specifies the actual key to use.
     *
     * @param string $name
     * @param string $target
     * @return Zend_Controller_Request_Http
     */
    public function setAlias($name, $target)
    {
        $this->_aliases[$name] = $target;
        return $this;
    }

    /**
     * Retrieve an alias
     *
     * Retrieve the actual key represented by the alias $name.
     *
     * @param string $name
     * @return string|null Returns null when no alias exists
     */
    public function getAlias($name)
    {
        if (isset($this->_aliases[$name])) {
            return $this->_aliases[$name];
        }

        return null;
    }

    /**
     * Retrieve the list of all aliases
     *
     * @return array
     */
    public function getAliases()
    {
        return $this->_aliases;
    }

    /**
     * Return the method by which the request was made
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->getServer('REQUEST_METHOD');
    }

    /**
     * Was the request made by POST?
     *
     * @return boolean
     */
    public function isPost()
    {
        if ('POST' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by GET?
     *
     * @return boolean
     */
    public function isGet()
    {
        if ('GET' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by PUT?
     *
     * @return boolean
     */
    public function isPut()
    {
        if ('PUT' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by DELETE?
     *
     * @return boolean
     */
    public function isDelete()
    {
        if ('DELETE' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by HEAD?
     *
     * @return boolean
     */
    public function isHead()
    {
        if ('HEAD' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by OPTIONS?
     *
     * @return boolean
     */
    public function isOptions()
    {
        if ('OPTIONS' == $this->getMethod()) {
            return true;
        }

        return false;
    }
}    
?>