<?php
require_once "Controller/Abstract.php";

class Controller_Bill_ViewController extends Controller_Abstract
{
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
    
    public function indexAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('bill/view_index'));
        $this->gridAction();     
    }
    public function gridAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('bill/view_list'));     
    }
    
    /*public function updateStatusAction()
    {
        $customer = Ccc::getModel("customer");
        $customerValues = $this->getRequest()->getParams();
        $id = $this->getRequest()->getParams('statusId',0);
        $isEnabled = (int)$this->getRequest()->getParams('status');
        
        $customer->load($customerValues['statusId']);
        if($customerValues['statusId'])
        {      
            if($customer->is_enabled == Model_Customer::STATUS_NO)
            {         
                $isEnabled = Model_Customer::STATUS_YES;
            }
            elseif($customer->is_enabled == Model_Customer::STATUS_YES)
            {    
                $isEnabled = Model_Customer::STATUS_NO;
            }
            
            $customer->is_enabled = $isEnabled;
            $customer->updated_date = date("Y-m-d H:i:s");
           
            $customer->update();
        }    
        $this->redirect('customer_index','index'); 
    }
    
    public function deleteAction()
    {
        try
        {
            $customer = Ccc::getModel("customer");
            $id = $this->getRequest()->getParam('deleteId');  
            
            if(!$id && $id < 0)
            {
                throw new Exception("Invalid Id");
            }
            if($this->getRequest()->getParam('deleteId'))
            {
                $customer->load($this->getRequest()->getParam('deleteId'));  
            }
            
            $customer->delete();
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
         
        $this->redirect('customer_index','index');     
    }
    
    public function editAction()
    {
        $customer = Ccc::getModel("customer");
        $id = (int)$this->getRequest()->getParam('editId');  
         
        if(!$id && $id < 0)
        {
            throw new Exception("Invalid Id");
        }
        
        if($this->getRequest()->getParam('editId'))
        {
            $customer->load($this->getRequest()->getParam('editId'));
            $this->getLayout()->getContent()
                              ->setBlock(Ccc::getBlock('customer/index_create')); 
        }
    }
    
    public function saveAction()
    {
        $customer = Ccc::getModel("customer");
        
        try
        {
            $customerValues = $this->getRequest()->getParams();
            if($this->getRequest()->getParam('submit') && $this->getRequest()->isPost()) 
            {
                $customer->first_name = $customerValues['first_name'];
                $customer->last_name = $customerValues['last_name'];
                $customer->email = $customerValues['email'];
                $customer->password = $customerValues['password'];
                $customer->is_enabled = $customerValues['is_enabled'];
                
                if($this->getRequest()->getParam('customer_id'))
                {
                    $customer->customer_id = $this->getRequest()->getParam('customer_id');    
                    $customer->updated_date = date("Y-m-d H:i:s");
                    $customer->update(); 
                    
                }
                else
                {
                    $customer->created_date = date('Y-m-d H:i:s');
                    $customer->insert();
                }
            }
        }
        catch(Exception $e)
        {
            $e->getMessage();
        } 
        $this->redirect('customer_index','index');
    } */ 
}
?>
