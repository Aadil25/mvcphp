<?php
require_once "Controller/Abstract.php";

class Controller_Product_IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('product/index_index'));
        $this->gridAction();     
    }
    public function gridAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('product/index_list'));     
    }
    
    public function createAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('product/index_create'));     
    }
    
    public function updateStatusAction()
    {
        $product = Ccc::getModel("product");
        $productValues = $this->getRequest()->getParams();
        $id = $this->getRequest()->getParams('statusId',0);
        $isEnabled = (int)$this->getRequest()->getParams('status');
        
        $product->load($productValues['statusId']);
        if($productValues['statusId'])
        {      
            if($product->is_enabled == Model_Product::STATUS_NO)
            {         
                $isEnabled = Model_Product::STATUS_YES;
            }
            elseif($product->is_enabled == Model_Product::STATUS_YES)
            {    
                $isEnabled = Model_Product::STATUS_NO;
            }
            
            $product->is_enabled = $isEnabled;
            $product->updated_date = date("Y-m-d H:i:s");
           
            $product->update();
        }    
        $this->redirect('customer_index','index'); 
    }
    
    public function deleteAction()
    {
        try
        {
            $product = Ccc::getModel("product");
            $id = $this->getRequest()->getParam('deleteId');  
            
            if(!$id && $id < 0)
            {
                throw new Exception("Invalid Id");
            }
            if($this->getRequest()->getParam('deleteId'))
            {
                $product->load($this->getRequest()->getParam('deleteId'));  
            }
            
            $product->delete();
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
         
        $this->redirect('product_index','index');     
    }
    
    public function editAction()
    {
        $product = Ccc::getModel("product");
        $id = (int)$this->getRequest()->getParam('editId');  
         
        if(!$id && $id < 0)
        {
            throw new Exception("Invalid Id");
        }
        
        if($this->getRequest()->getParam('editId'))
        {
            $product->load($this->getRequest()->getParam('editId'));
            $this->getLayout()->getContent()
                              ->setBlock(Ccc::getBlock('product/index_create')); 
        }
    }
    
    public function saveAction()
    {
        $product = Ccc::getModel("product");
          
        try
        {
            $productValues = $this->getRequest()->getParams();
            if($this->getRequest()->getParam('submit') && $this->getRequest()->isPost()) 
            {
                $product->name = $productValues['name'];
                $product->sku = $productValues['sku'];
                $product->price = $productValues['price'];
                $product->quantity = $productValues['quantity'];
                $product->is_enabled = $productValues['is_enabled'];
                $product->category_id = $productValues['category'];
                 
                if($this->getRequest()->getParam('product_id'))
                {
                    $product->product_id = $this->getRequest()->getParam('product_id');    
                    $product->updated_date = date("Y-m-d H:i:s");
                    $product->update(); 
                    
                }
                else
                {
                    $product->created_date = date('Y-m-d H:i:s');
                    $product->insert();
                }
            }
        }
        catch(Exception $e)
        {
            $e->getMessage();
        } 
        $this->redirect('product_index','index');
    }  
}
?>
