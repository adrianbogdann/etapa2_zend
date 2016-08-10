<?php
class Application_Forms_Editare extends Zend_Form {
    public function init() {
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Nu poate fi gol');

        $campNume = new Zend_Form_Element_Text('id');
        $campNume->setLabel('Id')
            ->setRequired(true)
            ->addValidator($validator);

        $campImage = new Zend_Form_Element_Text('image');
        $campImage->setLabel('Image')
            ->setRequired(true)
            ->addValidator($validator);

        $campData = new Zend_Form_Element_Text('title');
        $campData->setLabel('Title')
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
        
        $this->addElements(array($campNume,$campImage, $campData, $campDesc, $campPrice));
    }
}
?>
