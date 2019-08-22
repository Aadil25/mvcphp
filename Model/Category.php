<?php
require_once("Abstract.php");
class Model_Category extends Model_Abstract
{
    protected $_name = 'category';
    protected $_primary = 'category_id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";
}


?>
