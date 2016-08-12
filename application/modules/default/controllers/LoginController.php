<?php
class LoginController extends Zend_Controller_Action
{
    public function indexAction() {
        $this->view->loginform = $login = new Application_Forms_Login();

        if ($this->getRequest()->getParam('loginUser') !== null) {
            if (!$login->isValid($this->getRequest()->getParams())) {
                $this->view->mesaj = 'Incorrect credentials';
            } else {
                if (($this->getRequest()->getParam('loginUser') == LOGINUSER) AND ($this->getRequest()->getParam('loginPassword') == LOGINPASS)) {
                    //$this->_helper->FlashMessenger('Successful Login');
                    //$loginsession->user = 'admin';
                    $_SESSION['user'] = 'admin';
                    $this->redirect('/list '); //module/controller/action
                }
            }
        }
    }
}