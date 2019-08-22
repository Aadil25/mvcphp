<?php
require_once("Abstract.php");
class Model_Parts extends Model_Abstract
{
    protected $_name = 'parts_details';
    protected $_primary = 'id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";
}
?>
