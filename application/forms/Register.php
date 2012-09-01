<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
/* 		$this->setMethod('post');
		$this->setAttrib('action','save');
		$this->addElement('text','login',array(
			'label' => 'Username'
		));
		$this->addElement('text','email',array(
			'label' => 'Email',
			'required' => true,
			'validators' => array('EmailAddress')			
		));
		$this->addElement('submit','Save'); */
		
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('name')
			->addFilter('StripTags')
			->setRequired(true);
			
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('password')
					->setRequired(true);
		
		$save = new Zend_Form_Element_Submit('Save');
		$save->setLabel('save');
		
		$this->addElements(array($name,$password,$save));
		
		
    }


}

