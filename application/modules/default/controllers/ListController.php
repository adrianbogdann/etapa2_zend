<?php
class ListController extends Zend_Controller_Action {
    public function indexAction() {
        $products = new Application_Models_Products();
        $this->view->list = $products->fetchAll();
    }
}