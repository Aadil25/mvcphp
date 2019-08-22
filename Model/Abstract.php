<?php
class Model_Abstract
{
    const BASE_PATH = "Model/";
    
    protected $_data = array();
    protected $_name = null;
    protected $_primary = null;
    
    public function __construct()
    {
        
    }
    
    public function __set($key, $value = null)
    {
        $key = trim($key);
        if(!$key)
        {
            throw new exception('Key should not be null.');
        }
        $this->_data[$key] = $value;
        return $this;
    }
    
    public function __get($key)
    {
        $key = trim($key);
        if(!$key)
        {
            throw new exception('Key should not be null.');
        }
        
        if(array_key_exists($key, $this->_data))
        {
            return $this->_data[$key];    
        }
        return null;
    }
    
    public function getPrimary()
    {
        return $this->_primary;
    }
    
    public function setData($data)
    {
        if(!is_array($data))
        {
            throw new exception('data must be an array.');
        }
        $this->_data = $data;
    }
    
    public function getTableName()
    {
        return $this->_name;
    }
    
    public function getAdapter()
    {
        return new Model_Database();
    }
    
    public function insert()
    {
        if(array_key_exists($this->getPrimary(), $this->_data))
        {
            unset($this->_data[$this->getPrimary()]);    
        }
        
        if(!count($this->_data))
        {
            throw new exception('Data is not Found.');
        }
        
        $query = "INSERT INTO `{$this->getTableName()}` "."(`".implode("`,`", array_keys($this->_data))."`)"." VALUES "."('".implode("','", array_values($this->_data))."')";
        
        $id = $this->getAdapter()->exec_query($query);
        if($id)
        {
            $this->_data[$this->getPrimary()] = $id;
            return $this;
        }
    }
    
    public function update()
    {
        if(!(int)$this->_data[$this->getPrimary()])
        {
            throw new exception('Primary Key is not Found.');
        }
        
        if(!count($this->_data))
        {
            throw new exception('Data is not Found.');
        }
        $fields = implode(',',array_keys($this->_data));
        $values = "'".implode("','",$this->_data)."'";
        
        $updateData = array();
        foreach($this->_data as $key=>$value) 
        {
            $updateData[] = "$key = '$value'"; 
        }
        
        $query = "UPDATE `{$this->getTableName()}` SET ".implode(',',$updateData)." WHERE ".$this->getPrimary()." = ".$this->_data[$this->getPrimary()]."";
        
        if($this->getAdapter()->exec_query($query))
        {
            return true;
        }
        
        return false;
    }
    
    public function load($id)
    {
        if((int)$id)
        {
            $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimary()}` = ".(int)$id;            
            $row = $this->getAdapter()->fetchRow($query);
            if($row)
            {
                $this->setData($row);
                return $this;
            }
        }
        return null;
    }
   
    public function delete()
    {
        
        if(!(int)$this->_data[$this->getPrimary()])
        {
            throw new exception('Primary Key should not be null.');
        }
        
        $query = "DELETE FROM `{$this->getTableName()}` WHERE ".$this->getPrimary()." = ".$this->_data[$this->getPrimary()];

        if($this->getAdapter()->exec_query($query))
        {
          return true;
        }

        return false;
    }
    
    public function fetchRow($query = '')
    {    
        if($query)
        {
            //$model  =  new Model();
            $row = $this->getAdapter()->fetchRow($query);
            
            if(!$row)
            {
                return null;
            }
            
            $model = $this->setData($row);
            return $model;
        }
        return null;
    }
    
    public function fetchAll($query = null)
    {
        if($query)
        {
           $collection = $this->getAdapter()->fetchAll($query); 

           if($collection)
           {
                foreach($collection as &$row)
                {
                    //$model  =  new Model(); 
                    $model = $this->setData($row); 
                    //$row = $model;
                }
                return $collection;
           }
        }else{
            return null;
        }
    }
}
Ccc::getModel('database');
?>