<?php
final class Ccc
{
    Const CONTROLLER_BASE_PATH = "Controller/";
    Const MODEL_BASE_PATH = "Model/";
    Const BLOCK_BASE_PATH = "View/Block/";
    Const LAYOUT_BASE_PATH = "Layout/";
    
    public static function init()
    {
        $request = self::getModel('request');
        $request->createSession();
        $controller = self::getController($request->getControllerName());
        $controller->init();       
    } 
    
    public static function getModel($model = NULL)
    {
        if($model != NULL)
        {
            $modelArray = explode("/", $model);
            if(count($modelArray)==2)
            {
                $modelArrayTmp[] = 'Model';
                $modelArrayTmp[] = ucfirst($modelArray[0]);
                $modelArrayTmp[] =  implode("_", array_map("ucfirst", explode("_", $modelArray[1])));
                
                $filepath =  self::MODEL_BASE_PATH.ucfirst($modelArray[0]).'/'.implode("/", array_map("ucfirst", explode("_", $modelArray[1]))).".php";
                $className = implode("_", $modelArrayTmp);
                self::checkClassExists($className,$filepath);
                return self::getInstance($className);
            }
            else if(count($modelArray)==1)
            {
                $modelArrayTmp[] = 'Model';
                $modelArrayTmp[] =  ucfirst($modelArray[0]);
                
                $filepath =  self::MODEL_BASE_PATH.ucfirst($modelArray[0]).".php";
                $className = implode("_", $modelArrayTmp);
                self::checkClassExists($className,$filepath);
                return self::getInstance($className);
            }
        }
        return NULL;
    }
    
    public static function getBlock($block = NULL)
    {
        if($block != NULL)
        {
            $blockArray = explode("/", $block);
            
            if(count($blockArray)==2)
            {        
                $blockArrayTmp[] = "View_Block";      
                $blockArrayTmp[] = ucfirst($blockArray[0]); 
                $blockArrayTmp[] =  implode("_", array_map("ucfirst", explode("_", $blockArray[1])));
                //$blockArrayTmp[] =  implode("_", explode("_", ucfirst($blockArray[1])));
                 
                $filepath = self::BLOCK_BASE_PATH.ucfirst($blockArray[0]).'/'.implode("/", array_map("ucfirst", explode("_", $blockArray[1]))).'.php';
                $className = implode("_", $blockArrayTmp);
                self::checkClassExists($className,$filepath);
                return self::getInstance($className);
            }
            else if(count($blockArray)==1)
            {   
                $blockArrayTmp[] = "View_Block";                    
                $blockArrayTmp[] = ucfirst($blockArray[0]);

                $filepath = self::BLOCK_BASE_PATH.ucfirst($blockArray[0]);
                $className = implode("_", $blockArrayTmp);
                self::checkClassExists($className,$filepath);
                return self::getInstance($className);
            }
        }
        return NULL;
    }
    
    public static function getController($controller = NULL)
    {
        if($controller != NULL)
        {
            $controllerArray = explode("_", $controller);

            if(count($controllerArray)==2)
            {        
                $controllerArrayTmp[] = 'Controller';
                $controllerArrayTmp[] = ucfirst($controllerArray[0]);
                $controllerArrayTmp[] = implode("_", array_map("ucfirst", explode("-", $controllerArray[1]))).'Controller';
                    
                $filepath = self::CONTROLLER_BASE_PATH.ucfirst($controllerArray[0]).'/'.ucfirst($controllerArray[1])."Controller.php";
                $className = implode("_", $controllerArrayTmp);
                if(self::checkClassExists($className,$filepath) == false){
                    return false;
                }else{
                    return self::getInstance($className);
                }
            }
            else if(count($controllerArray)==1)
            {   
                $filepath =  self::CONTROLLER_BASE_PATH.ucfirst($controllerArray[0])."Controller.php";
                $className = 'Controller_'.ucfirst($controller).'Controller';
                self::checkClassExists($className,$filepath);
                return self::getInstance($className);
            }
            
        }

        return NULL;
    }
    
    public static function getInstance($class)
    {
        return new $class();
    }
    
    public static function checkClassExists($className,$fileName)
    {    
        if(file_exists($fileName))
        {   
           /* error_reporting(E_ALL);
            ini_set("display_errors", 1); */
            require_once $fileName;

            if(!class_exists($className))
            {
               echo("class not exits");die;
            }  
        }
        else
        {

            return false;
        }

        return $className;
    }
}    
    
?>