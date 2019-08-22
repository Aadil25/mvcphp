<?php
require_once("Abstract.php");
class Model_Partsinvoicemap extends Model_Abstract
{
    protected $_name = 'parts_invoice_map';
    protected $_primary = 'id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";
}
?>
