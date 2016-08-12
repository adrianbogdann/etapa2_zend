<?php
class ListController extends Zend_Controller_Action {
    public function indexAction() {
        $products = new Application_Models_Products();
        $this->view->list = $products->fetchAll();
    }

    public function adaugaAction() {
        $this->view->form = $form = new Application_Forms_Editare();
        if($this->getRequest()->getParam('id') !== null) {
            if (!$form->isValid($this->getRequest()->getParams())) {
                $this->view->mesaj = 'Incorect';
            } else {
                $adapter = new Zend_File_Transfer_Adapter_Http();
                $adapter->setDestination('C:\wamp64\www\etapa2_zend\images');
                try {
                    $adapter->receive();
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }
                $photoname = $adapter->getFileName('image', false);
                $products = new Application_Models_Products();
                $product = $products->createRow();
                $product->productId = $this->getRequest()->getParam('id');
                $product->productImg = $photoname;
                $product->productTitle = $this->getRequest()->getParam('title');
                $product->productDesc = $this->getRequest()->getParam('desc');
                $product->productPrice = $this->getRequest()->getParam('price');
                $product->save();

                $this->_helper->redirector->gotoUrl('/list');
            }
        }
    }

    public function removeAction() {
        $id = $this->getRequest()->getParam('id');
        $products = new Application_Models_Products();
        $nors = $products->delete(array('productId in (?)' => $id));
    }
}