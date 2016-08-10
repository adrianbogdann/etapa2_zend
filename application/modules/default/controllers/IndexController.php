<?php
class IndexController extends Zend_Controller_Action {
    public function indexAction() {
        $products = new Application_Models_Products();
        $this->view->products = $products->fetchAll();

    }
    
    public function adaugaAction() {
        $this->view->form = $form = new Application_Forms_Editare();

        if($this->getRequest()->getParam('id') !== null) {
            if (!$form->isValid($this->getRequest()->getParams())) {
                $this->view->mesaj = 'Incorect';
            } else {
                $products = new Application_Models_Products();
                $product = $products->createRow();
                $product->productId = $this->getRequest()->getParam('id');
                $product->productTitle = $this->getRequest()->getParam('title');
                $product->productDesc = $this->getRequest()->getParam('desc');
                $product->productPrice = $this->getRequest()->getParam('price');
                $product->productImg = $this->getRequest()->getParam('image');
                $product->save();
                
                $this->_helper->redirector->gotoUrl('/');
            }
        }
    }

    public function addtocartAction() {
        session_start();
        $id = $this->getRequest()->getParam('id');
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][$id] = $id;
        $this->view->prids = $_SESSION['cart'];
    }
}
?>