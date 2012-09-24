<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
                ->addFilter('StripTags')
               ->setRequired('true');

        $password = new Zend_Form_Element_Text('password');
        $password->setLabel('Password')
                 ->addFilter('StripTags')
                 ->setRequired('true');

         $submit = new Zend_Form_Element_Submit('login');
         $submit->setLabel('Login');

         $this->addElements(array($email,$password,$submit));
    }


}

