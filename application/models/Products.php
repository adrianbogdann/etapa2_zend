<?php
class Application_Models_Contacte extends Zend_Db_Table_Abstract {
    protected $_name            = 'products';
    protected $_primary         = 'productId';
    protected $_rowClass        = 'Application_Models_Product';
}
?>