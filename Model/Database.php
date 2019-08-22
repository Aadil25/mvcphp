<?php
class Model_Database
{
    protected $_database = null;
    protected $_connection = null;
    public function connection()
    {
        $host = "localhost";
        $userName = "root";
        $password = "Root@1234";
        $dataBase = "mm_auto";

        $host = trim($host);
        if(!$host)
        {
            throw new exception('Host should not be null.');
        }
        $userName = trim($userName);
        if(!$userName)
        {
            throw new exception('UserName should not be null.');
        }
        $password = trim($password);
        if(!$password)
        {
            throw new exception('Password should not be null.');
        }
        $dataBase = trim($dataBase);
        if(!$dataBase)
        {
            throw new exception('DataBase should not be null.');
        }
        
        $connection = mysqli_connect($host,$userName,$password,$dataBase);
        if (!$connection) 
        {
            throw new exception('Could not connect: ' . mysql_error());
        }
        
        //$this->_database = $db;
        $this->_connection = $connection;
        return $this->_connection;
    }
    
    public function exec_query($data)
    {   
        $run = mysqli_query($this->connection(),$data);
        if(!$run)
        {
           throw new Exception("Invalid query"); 
        }
        
        $newId = mysqli_insert_id();
        
        if($newId)
        {
            return $newId;
        }
        
        return true;
    }
    public function fetchRow($query = '')
    {    
        if($query)
        {
            $res = mysqli_query($this->connection(),$query);
            if($res)
            {       
                 return mysqli_fetch_assoc($res);
            }
            
        }
        return null;
    }
    
    public function fetchAll($query = '')
    {
        if($query)
        {
            $res = mysqli_query($this->connection(),$query); 
            if($res)
            {      
                $temp=array();
                while($row=mysqli_fetch_assoc($res))
                {
                    $temp[]=$row;
                }
                return $temp;
            }
        }
        return null;
    }
}

$database = new Model_Database();
$database->connection();
?>
