<?php

class IndexController extends Zend_Controller_Action
{
    protected $_em;

    public function init()
    {
        
    }

    public function indexAction()
    {
       
    }

    public function testAction(){

        $staffProfile = new Application_form_ExampleForm();
        $this->view->exampleform = $staffProfile;
    }




}

