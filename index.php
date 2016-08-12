<?php
    require_once('config.php');

    require_once('Zend/Loader.php');
    function __autoload($className) {
        Zend_Loader::loadClass($className);
    }
    session_start();
    //$loginsession = new Zend_Session_Namespace('userlogged');
    $db = Zend_Db::factory('MYSQLI', array(
        'host'     => DBSERVER,
        'username' => DBUSER,
        'password' => DBPASS,
        'dbname'   => DBDATABASE
    ));

    Zend_Db_Table::setDefaultAdapter($db);

    $front = Zend_Controller_Front::getInstance();
    $front->throwExceptions(true);
    $front->addModuleDirectory('application/modules/');
    try{
        $front->dispatch();
    }
    catch(Exception $ex) {
        print_r($ex->__toString());
    }
?>