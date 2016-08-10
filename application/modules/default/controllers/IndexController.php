<?php
class IndexController extends Zend_Controller_Action {
    public function indexAction() {
        $products = new Application_Models_Products();
        $this->view->products = $products->fetchAll();
    }
    
    public function adaugaAction() {
        $this->view->form = $form = new Application_Forms_Editare();

        if($this->getRequest()->getParam('nume') !== null) {
            if (!$form->isValid($this->getRequest()->getParams())) {
                $this->view->mesaj = 'Incorect';
            } else {
                $products = new Application_Models_Products();
                $product = $products->createRow();
                $product->nume = $this->getRequest()->getParam('nume');
                $product>data_nasterii = $this->getRequest()->getParam('data_nasterii');
                $product->detalii = $this->getRequest()->getParam('detalii');
                $product->save();
                
                $this->_helper->redirector->gotoUrl('/');
            }
        }
    }
}
?>