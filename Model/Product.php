<?php
require_once("Abstract.php");
class Model_Product extends Model_Abstract
{
    protected $_name = 'product';
    protected $_primary = 'product_id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";
}


?>
