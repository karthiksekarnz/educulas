<?php

class TestController extends Zend_Controller_Action
{
    protected $_em;

    public function init()
    {
         $bootstrap = $this->getInvokeArg('bootstrap');
         $this->_em = $bootstrap->getResource('entitymanager');

    }

    public function indexAction()
    {
        $testEntity = new Campus\Entity\Users();
        $testEntity->setUsername('karthik');
        $this->_em->persist($testEntity);
        $this->_em->flush();
		
    }
	
}

