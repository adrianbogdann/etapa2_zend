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
            $products = new Application_Models_Products();
            $this->view->products = $products->fetchAll(array('productId in (?)' => $_SESSION['cart']));
        }
    }


    public function removefromcartAction() {
        $id = $this->getRequest()->getParam('id');
        unset($_SESSION['cart'][$id]);
    }

    public function checkoutAction() {
        $products = new Application_Models_Products();
        $total = 0;
        $msgBody = '';
        $orderedProducts = $products->fetchAll(array('productId in (?)' => $_SESSION['cart']));
        $prodArray = $orderedProducts->toArray();
        foreach($prodArray as $product) {
            $msgBody .= "Product name: ".$product['productTitle']." ";
            $msgBody .= "Description: ".$product['productDesc']." ";
            $msgBody .= "Price: ".$product['productPrice']. " ";
            $total += $product['productPrice'];
        }
        $msgBody .= "Total= ".$total;
        //$this->view->finalcomanda = $msgBodyFinal;

        $to = "admin@wampserver.invalid";
        $subject = "Order details";
        $header = "From:abc@somedomain.com \r\n";
        $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail ($to,$subject,$msgBody,$header);
        if( $retval == true ) {
            unset($_SESSION['cart']);
            $this->view->mesaj = "Message sent successfully...";
        } else {
            $this->view->mesaj = "Message could not be sent...";
        }
    }
}
?>