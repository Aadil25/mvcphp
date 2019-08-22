<?php
require_once("Abstract.php");
class Model_Customervehicalmap extends Model_Abstract
{
    protected $_name = 'customer_vehical_map';
    protected $_primary = 'id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";
}
?>
