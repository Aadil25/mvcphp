<?php
require_once("Abstract.php");
class Model_Customer extends Model_Abstract
{
    protected $_name = 'customer';
    protected $_primary = 'id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";

    public function checkCustomerIsExists($customer){
    	$query = "SELECT * FROM `{$this->getTableName()}` WHERE `{vehical_number}` = ".$customer['vehical_number'];
        $row = $this->getAdapter()->fetchRow($query);
        if(!$row)
        {
            return null;
        }else{
        	return true;
        }
    }

    public function getCustomerData(){
        $query = "SELECT * FROM `{$this->getTableName()}`";
        $row = $this->fetchAll($query);
        if(!$row)
        {
            return null;
        }else{
            return $row;
        }
    }

    public function fetchCustomerData($query){
        //echo $query;die;
        //$query = "SELECT * FROM `{$this->getTableName()}`";
        $row = $this->fetchAll($query);
        if(!$row)
        {
            return null;
        }else{
            return $row;
        }
    }

    public function getCustomerById($id){
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE id = ".$id;
       
        $row = $this->getAdapter()->fetchRow($query);
        if(!$row)
        {
            return null;
        }else{
            return true;
        }
    }
}
?>
