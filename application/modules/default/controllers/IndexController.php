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
        $id = $this->getRequest()->getParam('id');
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][$id] = $id;
        $this->view->prids = $_SESSION['cart'];
    }

    public function cartAction()
    {
        if (empty($_SESSION['cart'])) {
            $this->view->emptycart = 'Cart is empty';
        } else {
            $ids = array();
            foreach ($_SESSION['cart'] as $id) {
                $ids[] = $id;
            }
            $products = new Application_Models_Products();
            $this->view->products = $products->fetchAll(array('productId in (?)' => $_SESSION['cart']));
        }
    }

    public function removefromcartAction() {
        $id = $this->getRequest()->getParam('id');
        unset($_SESSION['cart'][$id]);
    }
}
?>