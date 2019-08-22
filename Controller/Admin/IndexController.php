<?php
require_once "Controller/Abstract.php";

class Controller_Admin_IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('admin/index_list'));     
    }

    public function saveAction()
    {
        $admin = Ccc::getModel("admin");
        
        try
        {
            $adminValues = $this->getRequest()->getParams();
            $adminData = $adminValues['admin'] ;
            if($adminValues['action'] == "save" && $this->getRequest()->isPost()) 
            {
                $admin->first_name = $adminData['first_name'];
                $admin->last_name = $adminData['last_name'];
                $admin->email = $adminData['email'];
                $admin->user_name = $adminData['user_name'];
                $admin->password = $adminData['password'];
                if($adminData['admin_id'] != "" || $adminData['admin_id'] != null)
                {
                    $admin->admin_id = $adminData['admin_id'];    
                    $admin->updated_date = date("Y-m-d H:i:s");
                    $admin->update(); 
                    
                }
                else
                {
                    $admin->created_date = date('Y-m-d H:i:s');
                    $admin->insert();
                }
            }
        }
        catch(Exception $e)
        {
            $e->getMessage();
        } 
        $this->redirect('admin_index','index');
    }
}
?>
