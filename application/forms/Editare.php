<?php
class Application_Forms_Editare extends Zend_Form {
    public function init() {
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Nu poate fi gol');

        $campId = new Zend_Form_Element_Text('id');
        $campId->setLabel('Id')
            ->setRequired(true)
            ->addValidator($validator);

        $campImage = new Zend_Form_Element_File('image');
        $campId->setLabel('Image');

        $campTitle = new Zend_Form_Element_Text('title');
        $campTitle->setLabel('Title')
            ->setRequired(true)
            ->addValidator($validator);
            
        $campDesc = new Zend_Form_Element_Textarea('desc');
        $campDesc->setLabel('Description');

        $campPrice = new Zend_Form_Element_Text('price');
        $campPrice->setLabel('Price')
            ->setRequired(true)
            ->addValidator($validator);
            
        $buton = new Zend_Form_Element_Submit('submit');
        $buton->setLabel('OK');
        
        $this->addElements(array($campId, $campImage, $campTitle, $campDesc, $campPrice, $buton));
    }
}
?>