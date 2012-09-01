<?php

class AjaxController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->getHelper('layout')->disableLayout();
    }

    public function indexAction()
    {
        
    }
	
}

