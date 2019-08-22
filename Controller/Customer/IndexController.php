<?php
require_once "Controller/Abstract.php";

class Controller_Customer_IndexController extends Controller_Abstract
{
    public function indexAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('customer/index_index'));
        $this->gridAction();     
    }
    public function gridAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('customer/index_list'));     
    }
    
    public function createAction()
    {
        $this->getLayout()->getContent()
                          ->setBlock(Ccc::getBlock('customer/index_create'));     
    }
    
    public function updateStatusAction()
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
    
    public function saveinsessionAction(){
        try
        {
            $customerData = $this->getRequest()->getPost();
            $this->getRequest()->setSession('customerData',$customerData);
        }
        catch(Exception $e)
        {
            $e->getMessage();
        } 
        $this->redirect('bill_part','index');
    }

    public function searchbrandAction(){
        $postData = $this->getRequest()->getParams();
        $vehical = Ccc::getModel("vehical");

        if(isset($postData['brand_name'])){
            $results = array('error' => false, 'data' => '');
            $querystr = $postData['brand_name'];
       
            if(empty($querystr)){
                $results['error'] = true;
            }else{
                $result = $vehical->getBrandNames($postData['brand_name']);
               
                /*if(isset($result))
                {
                    //$results = array();
                    $results['data'] = "<ul>";
                    foreach ($result as $key => $value) {
                        $results['data'] .= "<li class='list-gpfrm-list' data-fullname='".$value['brand_name']."'>".$value['brand_name']."</li>";
                    }
                    $results['data'] .= "</ul>";
                }
                else{
                    $results['data'] = "<span class='list-gpfrm-list'>No found data matches Records</span>";
                }*/
                if(isset($result))
                {
                    //$results = array();
                    
                    foreach ($result as $key => $value) {
                        $results[] = $value['brand_name'];
                    }
                    
                }
                else{
                    $results[] = "No found data matches Records";
                }

            }
        
            echo json_encode($results);
        }
    }

    public function saveAction()
    {
        $customer = Ccc::getModel("customer");
        $vehical = Ccc::getModel("vehical");
        $invoice = Ccc::getModel("invoice");
        $customerVehicalMap = Ccc::getModel("Customervehicalmap");
        $service = Ccc::getModel("service");
        $serviceInvoiceMap = Ccc::getModel("serviceinvoicemap");
        $parts = Ccc::getModel("parts");
        $partsInvoiceMap = Ccc::getModel("partsinvoicemap");
        
        try
        {
            
            $allData = $this->getRequest()->getSession();

            $customerValues = $allData['customerData']['customer'];
            $vehicalValues = $allData['customerData']['vehical'];

            $partsValues = $allData['partData']['part'];
            $serviceValues = $allData['serviceData']['service'];
            
           
            $postData = $this->getRequest()->getPost();
            if($this->getRequest()->getSession()) 
            {   
               
                if($customerValues):
                    if(!$customer->checkCustomerIsExists($customerValues))
                    {
                        $customer->customer_name = $customerValues['customer_name'];
                        $customer->mobile_number = $customerValues['mobile_number'];
                        $customer->vehical_number = $customerValues['vehical_number'];
                        $customer->created_date = date('Y-m-d H:i:s');
                        
                        $customer->insert();
                    }else{
                        $customer->id = $this->getRequest()->getParam('id');    
                        $customer->updated_date = date("Y-m-d H:i:s");
                        $customer->update(); 
                    }
                    
                        $vehical->brand_name = $vehicalValues['brand_name'];
                        $vehical->model_name = $vehicalValues['model_name'];
                        $vehical->additional_info = $vehicalValues['additional_info'];
                        $vehical->insert();

                        $customerVehicalMap->customer_id = $customer->id;
                        $customerVehicalMap->vehicle_id = $vehical->id;
                        $customerVehicalMap->insert();

                        $invoice->cust_id = $customer->id;
                        $invoice->total_amount = $postData['total_amount'];
                        $invoice->created_date = date('Y-m-d H:i:s');
                        $invoice->insert();
                        
                        $partIds = array();
                        $serviceIds = array();

                        foreach ($partsValues as $key => $_parts) {
                            $parts->parts_name = $_parts["part_name"];
                            $parts->rate = $_parts["rate"];
                            $parts->insert();

                            $partsInvoiceMap->invoice_id = $invoice->id;
                            $partsInvoiceMap->parts_id = $parts->id;
                            $partsInvoiceMap->qty = $_parts["qty"];
                            $partsInvoiceMap->amount = $_parts["amount"];
                            $partsInvoiceMap->insert();  
                            
                        }

                        foreach ($serviceValues as $key => $_service) {
                            
                            $service->service_name = $_service["service_name"];
                            $service->insert();

                            $serviceInvoiceMap->invoice_id = $invoice->id;
                            $serviceInvoiceMap->service_id = $service->id;
                            $serviceInvoiceMap->amount = $_service["amount"];
                            $serviceInvoiceMap->insert();  
                        }
                    
                endif;
                
                /*if($this->getRequest()->getParam('customer_id'))
                {
                    $customer->customer_id = $this->getRequest()->getParam('customer_id');    
                    $customer->updated_date = date("Y-m-d H:i:s");
                    $customer->update(); 
                    
                }
                else
                {
                    $customer->created_date = date('Y-m-d H:i:s');
                    $customer->insert();
                }*/
            }
        }
        catch(Exception $e)
        {
            $e->getMessage();
        } 
        $this->redirect('bill_view','index');
    }  
}
?>
