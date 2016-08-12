<?php
class Application_Forms_Editare extends Zend_Form {
    public function init() {
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Nu poate fi gol');

        $this->setAttrib('enctype', 'multipart/form-data');

        $campId = new Zend_Form_Element_Text('id');
        $campId->setLabel('Id')
            ->setRequired(true)
            ->addValidator($validator);

        $campImage = new Zend_Form_Element_File('image');
        //-------------------------------------------------------------------------------------------
        $campImage->setLabel('Upload Image')
            ->addValidator('Count', false, 1)
            ->addValidator('Size', false, 67108864)
            ->addValidator('Extension', false, array('png', 'jpg', 'jpeg'));
            //->addFilter('Rename','C:\wamp64\www\etapa2_zend\images');




        //-------------------------------------------------------------------------------------------
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