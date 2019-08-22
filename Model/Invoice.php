<?php
require_once("Abstract.php");
class Model_Invoice extends Model_Abstract
{
    protected $_name = 'invoice';
    protected $_primary = 'id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";
}
?>
