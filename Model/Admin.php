<?php
require_once("Abstract.php");
class Model_Admin extends Model_Abstract
{
    protected $_name = 'admin';
    protected $_primary = 'admin_id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";

    public function getSelect(){
    	
    }
}


?>
