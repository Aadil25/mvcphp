<?php
require_once("Abstract.php");
class Model_Vehical extends Model_Abstract
{
    protected $_name = 'vehical_details';
    protected $_primary = 'id';
    
    const STATUS_YES = "1";
    const STATUS_NO = "2";

    public function getBrandNames()
    {
        $query = "SELECT brand_name,model_name FROM `{$this->getTableName()}`";
        $row = $this->fetchAll($query);
        return $row;
    }
}
?>
