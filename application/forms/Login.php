<?php
class Application_Forms_Login extends Zend_Form {
    public function init () {
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Nu poate fi gol');

        $campUser = new Zend_Form_Element_Text('loginUser');
        $campUser->setLabel('Username')
            ->setRequired(true)
            ->addValidator($validator);

        $campParola = new Zend_Form_Element_Password('loginPassword');
        $campParola->setLabel('Password')
            ->setRequired(true)
            ->addValidator($validator);

        $butonLogin = new Zend_Form_Element_Submit('submit');
        $butonLogin->setLabel('Login');

        $this->addElements(array($campUser, $campParola, $butonLogin));
    }
}