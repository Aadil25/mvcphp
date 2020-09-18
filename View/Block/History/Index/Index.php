<?php
require_once("View/Block/Abstract.php");

class View_Block_History_Index_Index extends View_Block_Abstract
{
    public function __construct()
    {
        parent::__construct();
        $this->_name = "history/index_index";
        $this->setTemplate('history/index/index.phtml');
    }

    protected function _prepareQuery(){
        $customerModel = Ccc::getModel('customer');
        $select = "SELECT * FROM `{$customerModel->getTableName()}`";
        $select = $this->_setFilter($select);
        return $select;

    }

    public function getCollection(){
        $customerModel = Ccc::getModel('customer');
        $select = $this->_prepareQuery();

        $customerData = $customerModel->fetchCustomerData($select);
        if(!$customerData)
        {
            return null;
        }else{
            return $customerData;
        }
    }
    
    protected function _setFilter($select){
        $requestModel = Ccc::getModel('request');
        $searchData = $requestModel->getPost();

        if(count($searchData) > 2){
            if($searchData['cust_name'])
            {
                $select .= ' WHERE `customer_name` LIKE "%'.$searchData['cust_name'].'%"';
            }

            if($searchData['mobile_number']){
                $select .= ' WHERE `mobile_number` = '.$searchData['mobile_number'];
            }

            if($searchData['vehicle_number']){
                $select .= ' WHERE `vehical_number` = "'.$searchData['vehicle_number'].'"';
            }
        
        }
        
        return $select;
    }
}
?>
