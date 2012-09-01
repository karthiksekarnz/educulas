<?php

class IndexController extends Zend_Controller_Action
{
    protected $_em;

    public function init()
    {
        /*
         * @var Bisna\Application\Container\DoctrineContainer
         *
         */
            $registry = Zend_Registry::getInstance();
            $this->_em = $registry->getInstance("entitymanager");
    }

    public function indexAction()
    {
    
        $u = new \Campus\Entity\Users();
        $u->setUsername('Karthik');
        $this->_em->persist($u);
        $this->_em->flush();
    }



}

