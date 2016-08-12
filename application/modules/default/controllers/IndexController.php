<?php
class IndexController extends Zend_Controller_Action {
    public function indexAction() {
        $products = new Application_Models_Products();
        $this->view->products = $products->fetchAll();
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