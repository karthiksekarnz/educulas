<?php

class Application_Form_Login extends ZendX_JQuery_Form
{

    public function init()
    {
        $email = new Zend_Form_Element_Text('username');
        $email->setLabel('Username')
                ->addFilter('StripTags')
               ->setRequired('true')
                ->addErrorMessage('Enter Username');

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
                 ->addFilter('StripTags')               
                 ->setRequired('true')
                ->addErrorMessage('Enter Password');

         $submit = new Zend_Form_Element_Submit('login');
         $submit->setLabel('Login')
                  ->setAttribs(array('class' => 'btn btn-primary'));

         $this->addElements(array($email,$password,$submit));
    }


}

