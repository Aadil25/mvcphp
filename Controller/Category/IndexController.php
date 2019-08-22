<?php
require_once "Controller/Abstract.php";

class Controller_Category_IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('category/index_index'));
        $this->gridAction();     
    }
    public function gridAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('category/index_list'));     
    }
    
    public function createAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('category/index_create'));     
    }
    
    public function updateStatusAction()
    {
        $category = Ccc::getModel("category");
        $categoryValues = $this->getRequest()->getParams();
        $id = $this->getRequest()->getParams('statusId',0);
        $isEnabled = (int)$this->getRequest()->getParams('status');
        
        $category->load($categoryValues['statusId']);
        if($categoryValues['statusId'])
        {      
            if($category->status == Model_Category::STATUS_NO)
            {         
                $isEnabled = Model_Category::STATUS_YES;
            }
            elseif($category->status == Model_Category::STATUS_YES)
            {    
                $isEnabled = Model_Category::STATUS_NO;
            }
            
            $category->status = $isEnabled;
            $category->updated_date = date("Y-m-d H:i:s");
           
            $category->update();
        }    
        $this->redirect('customer_index','index'); 
    }
    
    public function deleteAction()
    {
        try
        {
            $category = Ccc::getModel("category");
            $id = $this->getRequest()->getParam('deleteId');  
            
            if(!$id && $id < 0)
            {
                throw new Exception("Invalid Id");
            }
            if($this->getRequest()->getParam('deleteId'))
            {
                $category->load($this->getRequest()->getParam('deleteId'));  
            }
            
            $category->delete();
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
         
        $this->redirect('category_index','index');     
    }
    
    public function editAction()
    {
        $category = Ccc::getModel("category");
        $id = (int)$this->getRequest()->getParam('editId');  
         
        if(!$id && $id < 0)
        {
            throw new Exception("Invalid Id");
        }
        
        if($this->getRequest()->getParam('editId'))
        {
            $category->load($this->getRequest()->getParam('editId'));
            $this->getLayout()->getContent()
                              ->setBlock(Ccc::getBlock('category/index_create')); 
        }
    }
    
    public function saveAction()
    {
        $category = Ccc::getModel("category");
        try
        {
            $categoryValues = $this->getRequest()->getParams();
            if($this->getRequest()->getParam('submit') && $this->getRequest()->isPost()) 
            {
                $category->category_name = $categoryValues['category_name'];
                $category->status = $categoryValues['status'];
                if($this->getRequest()->getParam('category_id'))
                {
                    $category->category_id = $this->getRequest()->getParam('category_id');    
                    $category->updated_date = date("Y-m-d H:i:s");
                    $category->update(); 
                    
                }
                else
                {
                    $category->created_date = date('Y-m-d H:i:s');
                    $category->insert();
                }
            }
        }
        catch(Exception $e)
        {
            $e->getMessage();
        } 
        $this->redirect('category_index','index');
    }  
}
?>
